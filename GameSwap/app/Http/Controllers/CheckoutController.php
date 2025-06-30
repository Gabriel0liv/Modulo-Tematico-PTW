<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleDriveHelper;
use App\Models\User;
use App\Models\Compra;
use App\Models\CompraProduto;
use App\Models\Console;
use App\Models\Entrega;
use App\Models\jogo;
use App\Models\Morada;
use App\Models\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Notifications\EmailCompraEfetuadaComprador;
use App\Notifications\EmailProdutoVendidoVendedor;

class CheckoutController extends Controller
{
    /**
     * Exibe a página de checkout com os detalhes do carrinho e métodos de pagamento.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $user = auth()->user();
        $moradas = $user->moradas()->where('ativo', true)->get();
        $carrinho = session()->get('carrinho', []);

        // Atualizar os itens no carrinho com imagens e informações do banco de dados
        $carrinhoAtualizado = collect($carrinho)->map(function ($item) {
            if ($item['tipo_produto'] === 'jogo') {
                $produto = jogo::with('imagens')->find($item['id']);
            } elseif ($item['tipo_produto'] === 'console') {
                $produto = Console::with('imagens')->find($item['id']);
            } else {
                $produto = null;
            }

            if ($produto) {
                $item['imagem'] = $produto->imagens->first()
                    ? GoogleDriveHelper::transformGoogleDriveUrl($produto->imagens->first()->path ?? $produto->imagens->first()->caminho)
                    : '/placeholder.svg';
                $item['nome'] = $produto->nome;
                $item['preco'] = $produto->preco;
            }

            return $item;
        });

        // Atualizar a sessão, caso seja necessário
        session()->put('carrinho', $carrinhoAtualizado);

        // Cálculo de subtotal e total
        $subtotal = $carrinhoAtualizado->sum(function ($item) {
            return $item['preco'] * $item['quantidade'];
        });
        $envio = 4.99;
        $total = $subtotal + $envio;

        // Obter métodos de pagamento detalhados
        $cartoesDetalhados = [];
        foreach ($user->paymentMethods()->where('ativo', true)->get() as $cartao) {
            $stripeCard = \Stripe\PaymentMethod::retrieve($cartao->stripe_payment_method_id);

            $cartoesDetalhados[] = (object) [
                'id' => $cartao->id,
                'brand' => ucfirst($stripeCard->card->brand),
                'last4' => $stripeCard->card->last4,
                'exp_month' => $stripeCard->card->exp_month,
                'exp_year' => $stripeCard->card->exp_year,
                'nome_titular' => $stripeCard->billing_details->name,
                'is_default' => $cartao->is_default,
            ];
        }

        return view('paginas.checkout', [
            'user' => $user,
            'moradas' => $moradas,
            'cartoes' => $cartoesDetalhados,
            'subtotal' => $subtotal,
            'envio' => $envio,
            'total' => $total,
            'carrinho' => $carrinhoAtualizado,
        ]);
    }

    /**
     * Exibe a página de checkout com os detalhes do carrinho e métodos de pagamento.
     *
     * @return \Illuminate\View\View
     */
    public function checkout()
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $user = auth()->user();

        $cartoesSalvos = $user->paymentMethods;
        $moradas = $user->moradas;

        $cartoesDetalhados = [];

        foreach ($cartoesSalvos as $cartao) {
            $stripeCard = PaymentMethod::retrieve($cartao->stripe_payment_method_id);

            $cartoesDetalhados[] = (object) [
                'id' => $cartao->id,
                'brand' => $stripeCard->card->brand,
                'last4' => $stripeCard->card->last4,
                'exp_month' => $stripeCard->card->exp_month,
                'exp_year' => $stripeCard->card->exp_year,
                'nome_cartao' => $cartao->nome_cartao,
                'is_default' => $cartao->is_default,
            ];
        }

        return view('paginas.checkout', [
            'cartoes' => $cartoesDetalhados,
            'moradas' => $moradas,
        ]);
    }

    /**
     * Finaliza a compra com os dados do carrinho e métodos de pagamento.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function finalizarCompra(Request $request)
    {
        Log::debug('>>> Entrou em finalizarCompra');
        Log::debug('morada_id:', [$request->morada_id]);
        Log::debug('cartao_id:', [$request->cartao_id]);
        Log::debug('carrinho:', [session('carrinho')]);

        $request->validate([
            'morada_id' => 'required',
            'cartao_id' => 'required',
        ], [
            'morada_id.required' => 'Morada não selecionada.',
            'cartao_id.required' => 'Cartão não selecionado.',
        ]);


        $user = auth()->user();
        $carrinho = session()->get('carrinho', []);
        if (is_array($carrinho) && count($carrinho) === 1 && $carrinho[0] instanceof \Illuminate\Support\Collection) {
            $carrinho = $carrinho[0]->toArray();
        }

        if (empty($carrinho)) {
            return redirect()->back()->withErrors(['carrinho' => 'O carrinho está vazio.']);
        }

        $subtotal = collect($carrinho)->sum(fn($item) => $item['preco'] * $item['quantidade']);
        $envio = 4.99;
        $total = $subtotal + $envio;

        $cartao = PaymentMethod::where('id', $request->cartao_id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $intent = \Stripe\PaymentIntent::create([
                'amount' => intval($total * 100),
                'currency' => 'eur',
                'customer' => $user->stripe_customer_id,
                'payment_method' => $cartao->stripe_payment_method_id,
                'off_session' => true,
                'confirm' => true,
            ]);
        } catch (\Exception $e) {
            Log::error('Erro Stripe: ' . $e->getMessage());
            return redirect()->back()->withErrors(['stripe' => 'Erro no pagamento: ' . $e->getMessage()]);
        }

        DB::beginTransaction();

        try {
            $compra = Compra::create([
                'comprador_id' => $user->id,
                'morada_id' => $request->morada_id,
                'cartao_id' => $cartao->id,
                'total' => $total,
                'status' => 'pago',
            ]);

            foreach ($carrinho as $item) {
                // Registrar item
                CompraProduto::create([
                    'compra_id' => $compra->id,
                    'produto_id' => $item['id'],
                    'tipo_produto' => $item['tipo_produto'],
                    'vendedor_id' => $item['vendedor_id'],
                    'quantidade' => $item['quantidade'],
                    'preco_unitario' => $item['preco'],
                ]);

                // Tornar o produto inativo e atribuir comprador
                if ($item['tipo_produto'] === 'jogo') {
                    $produto = jogo::findOrFail($item['id']);
                } else {
                    $produto = Console::findOrFail($item['id']);
                }

                $produto->ativo = false;
                $produto->id_comprador = $user->id;
                $produto->save();

                // Enviar email ao vendedor
                $vendedor = User::find($item['vendedor_id']);
                if ($vendedor) {
                    $vendedor->notify(new EmailProdutoVendidoVendedor($produto, $user));
                }

                $produtosComprados[] = $produto;

                $user->notify(new EmailCompraEfetuadaComprador($produtosComprados));
            }



            DB::commit();
            session()->forget('carrinho');

            return redirect()->route('perfil-Compras')->with('success', 'Compra realizada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['erro' => 'Erro ao realizar compra: ' . $e->getMessage()]);
        }
    }

    /**
     * Exibe a página de checkout para destacar um anúncio.
     *
     * @return \Illuminate\View\View
     */
    public function checkoutDestaque()
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $user = auth()->user();
        $item = session('carrinho_destaque');

        if (!$item) {
            return redirect()->route('pagina_inical')->with('error', 'Nada para destacar.');
        }

        $cartoesSalvos = $user->paymentMethods->where('ativo',true);
        $cartoesDetalhados = [];

        foreach ($cartoesSalvos as $cartao) {
            $stripeCard = \Stripe\PaymentMethod::retrieve($cartao->stripe_payment_method_id);

            $cartoesDetalhados[] = (object) [
                'id' => $cartao->id,
                'brand' => $stripeCard->card->brand,
                'last4' => $stripeCard->card->last4,
                'exp_month' => $stripeCard->card->exp_month,
                'exp_year' => $stripeCard->card->exp_year,
                'nome_cartao' => $cartao->nome_cartao,
                'is_default' => $cartao->is_default,
            ];
        }

        return view('paginas.checkoutDestaque', [
            'cartoes' => $cartoesDetalhados,
            'item' => $item,
        ]);
    }

    /**
     * Finaliza o pagamento do destaque de um anúncio.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function finalizarPagamentoDestaque(Request $request)
    {
        Log::debug('>>> Entrou em finalizarPagamentoDestaque');
        Log::debug('cartao_id:', [$request->cartao_id]);
        Log::debug('item:', [session('carrinho_destaque')]);

        $request->validate([
            'cartao_id' => 'required',
        ], [
            'cartao_id.required' => 'Cartão não selecionado.',
        ]);

        $user = auth()->user();
        $item = session()->get('carrinho_destaque');

        if (!$item) {
            return redirect()->back()->withErrors(['item' => 'Nenhum item encontrado para destacar.']);
        }

        $valor = 4.90;
        $cartao = PaymentMethod::where('id', $request->cartao_id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $intent = PaymentIntent::create([
                'amount' => intval($valor * 100),
                'currency' => 'eur',
                'customer' => $user->stripe_customer_id,
                'payment_method' => $cartao->stripe_payment_method_id,
                'off_session' => true,
                'confirm' => true,
            ]);
        } catch (\Exception $e) {
            Log::error('Erro Stripe: ' . $e->getMessage());
            return redirect()->back()->withErrors(['stripe' => 'Erro no pagamento: ' . $e->getMessage()]);
        }

        try {
            $compra = Compra::create([
                'comprador_id' => $user->id,
                'morada_id' => null,
                'cartao_id' => $cartao->id,
                'total' => $valor,
                'status' => 'pago',
            ]);

            CompraProduto::create([
                'compra_id' => $compra->id,
                'produto_id' => null,
                'tipo_produto' => "destaque",
                'vendedor_id' => null,
                'quantidade' => 1,
                'preco_unitario' => $valor,
            ]);

            $tipo = $item['referencia'];
            $id = $item['id'];
            $dataFinal = now()->addDays(30);

            if ($tipo === 'jogo') {
                jogo::where('id', $id)->update([
                    'destaque' => true,
                    'destacado_ate' => $dataFinal,
                ]);
            } elseif ($tipo === 'console') {
                Console::where('id', $id)->update([
                    'destaque' => true,
                    'destacado_ate' => $dataFinal,
                ]);
            }

            session()->forget('carrinho_destaque');

            return redirect()->route('perfil-Anuncios')->with('success', 'Anúncio destacado por 30 dias com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['erro' => 'Erro ao processar destaque: ' . $e->getMessage()]);
        }
    }
}
