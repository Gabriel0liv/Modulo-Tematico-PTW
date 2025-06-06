<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleDriveHelper;
use App\Models\Console;
use App\Models\Jogo;
use App\Models\Morada;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Adiciona um produto ao carrinho.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adicionar(Request $request)
    {
        $produtoId = $request->input('produto_id');
        $tipo = $request->input('tipo_produto'); // ← tipo vem do input
        $quantidade = $request->input('quantidade', 1);

        // Buscar pelo tipo correto
        if ($tipo === 'jogo') {
            $produto = Jogo::find($produtoId);
        } elseif ($tipo === 'console') {
            $produto = Console::find($produtoId);
        } else {
            return back()->with('error', 'Tipo de produto inválido.');
        }

        if (!$produto) {
            return back()->with('error', 'Produto não encontrado.');
        }

        if (!$produto->id_anunciante) {
            return back()->with('error', 'Produto sem vendedor.');
        }

        $carrinho = collect(session()->get('carrinho', []))->toArray();
        $key = $tipo . '_' . $produtoId;

        if (isset($carrinho[$key])) {
            $carrinho[$key]['quantidade'] += $quantidade;
        } else {
            $carrinho[$key] = [
                'id' => $produto->id,
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'imagem' => $produto->imagem ?? '/imagens/padrao.jpg',
                'quantidade' => $quantidade,
                'tipo_produto' => $tipo,
                'vendedor_id' => $produto->id_anunciante
            ];
        }

        session()->put('carrinho', $carrinho);

        return redirect()->route('carrinho.index');
    }

    /**
     * Exibe o conteúdo do carrinho.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $itens = session()->get('carrinho', []);

        // Atualizar os itens do carrinho com informações mais completas
        $itensAtualizados = collect($itens)->map(function ($item) {
            if ($item['tipo_produto'] === 'jogo') {
                $produto = Jogo::with('imagens')->find($item['id']);
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

        // Atualizar a sessão com os itens corrigidos (caso necessário)
        session()->put('carrinho', $itensAtualizados);

        // Calcular o subtotal
        $subtotal = $itensAtualizados->sum(function ($item) {
            return $item['preco'] * $item['quantidade'];
        });

        // Recuperar moradas e métodos de pagamento
        $moradas = Morada::where('user_id', auth()->id())->get();
        $cartoes = auth()->user()->paymentMethods ?? [];

        // Retornar a view com os dados atualizados do carrinho
        return view('paginas.carrinho', [
            'itens' => $itensAtualizados,
            'subtotal' => $subtotal,
            'moradas' => $moradas,
            'cartoes' => $cartoes
        ]);
    }


    /**
     * Adiciona um destaque ao carrinho.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adicionarDestaque(Request $request)
    {
        $tipo = $request->input('tipo');
        $id = $request->input('id');

        // Lógica para identificar produto e sua imagem relevante
        if ($tipo === 'jogo') {
            $produto = Jogo::with('imagens')->find($id);
        } elseif ($tipo === 'console') {
            $produto = Console::with('imagens')->find($id);
        } else {
            $produto = null;
        }

        $imagem = $produto && $produto->imagens->isNotEmpty()
            ? GoogleDriveHelper::transformGoogleDriveUrl($produto->imagens->first()->path ?? $produto->imagens->first()->caminho)
            : '/img/destaque.png'; // Caminho default caso não haja imagem

        // Adicionando o item como destaque com detalhes consistentes
        $itemDestaque = [
            'id' => $id,
            'nome' => "Destaque de " . ucfirst($tipo),
            'preco' => 4.90,
            'quantidade' => 1,
            'tipo' => 'destaque',
            'referencia' => $tipo,
            'imagem' => $imagem,
        ];

        session()->put('carrinho_destaque', $itemDestaque);

        return redirect()->route('carrinho.destaque');

    }

    /**
     * Exibe o destaque do carrinho.
     *
     * @return \Illuminate\View\View
     */
    public function verCarrinhoDestaque()
    {
        $item = session('carrinho_destaque');
        return view('paginas.carrinhoDestaque', compact('item'));
    }


    /**
     * Remove um item do carrinho.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remover($id)
    {
        $carrinho = session()->get('carrinho', []);

        // Tenta encontrar o item no carrinho, independente do tipo
        foreach ($carrinho as $key => $item) {
            if ($key === $id || $item['id'] == $id) {
                unset($carrinho[$key]);
                session()->put('carrinho', $carrinho);
                break;
            }
        }

        return redirect()->route('carrinho.index')->with('success', 'Item removido do carrinho.');
    }
}
