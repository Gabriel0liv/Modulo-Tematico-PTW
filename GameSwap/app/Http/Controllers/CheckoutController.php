<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\CompraProduto;
use App\Models\Entrega;
use App\Models\Morada;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = auth()->user();
        $moradas = $user->moradas;
        $carrinho = session()->get('carrinho', []);
        $subtotal = collect($carrinho)->sum(function ($item) {
            return $item['preco'] * $item['quantidade'];
        });

        $envio = 4.99;
        $total = $subtotal + $envio;


        $cartoesDetalhados = [];
        foreach ($user->paymentMethods as $cartao) {
            $stripeCard = \Stripe\PaymentMethod::retrieve($cartao->stripe_payment_method_id);

            $cartoesDetalhados[] = (object)[
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
            'user' => $user,
            'moradas' => $moradas,
            'cartoes' => $cartoesDetalhados,
            'subtotal' => $subtotal,
            'carrinho' => $carrinho,
            'envio' => $envio,
            'total' => $total,
        ]);
    }

    public function checkout()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
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

    public function finalizarCompra(Request $request)
    {
        Log::debug('>>> Entrou em finalizarCompra');
        Log::debug('morada_id:', [$request->morada_id]);
        Log::debug('cartao_id:', [$request->cartao_id]);
        Log::debug('carrinho:', [session('carrinho')]);

        $request->validate([
            'morada_id' => 'required|exists:moradas,id',
            'cartao_id' => 'required|exists:payment_methods,id',
        ]);

        $user = auth()->user();
        $carrinho = session()->get('carrinho', []);

        if (empty($carrinho)) {
            return redirect()->back()->withErrors(['carrinho' => 'O carrinho está vazio.']);
        }

        $subtotal = collect($carrinho)->sum(fn($item) => $item['preco'] * $item['quantidade']);
        $envio = 4.99;
        $total = $subtotal + $envio;

        $cartao = PaymentMethod::where('id', $request->cartao_id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        Stripe::setApiKey(env('STRIPE_SECRET'));

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

                // Tornar o produto inativo
                if ($item['tipo_produto'] === 'jogo') {
                    \App\Models\Jogo::where('id', $item['id'])->update(['ativo' => false]);
                } elseif ($item['tipo_produto'] === 'console') {
                    \App\Models\Console::where('id', $item['id'])->update(['ativo' => false]);
                }
            }



            DB::commit();
            session()->forget('carrinho');

            return redirect()->route('checkout.sucesso')->with('success', 'Compra realizada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['erro' => 'Erro ao salvar compra: ' . $e->getMessage()]);
        }
    }
}
