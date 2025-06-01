<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\Jogo;
use App\Models\Morada;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
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

        $carrinho = session()->get('carrinho', []);
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

        return redirect()->route('carrinho.index')->with('success', 'Produto adicionado ao carrinho!');
    }

    public function index()
    {
        $itens = session()->get('carrinho', []);
        $subtotal = collect($itens)->sum(function ($item) {
            return $item['preco'] * $item['quantidade'];
        });

        $moradas = Morada::where('user_id', auth()->id())->get();
        $cartoes = auth()->user()->paymentMethods ?? [];

        return view('paginas.carrinho', compact('itens', 'subtotal', 'moradas', 'cartoes'));
    }

    public function remover($id)
    {
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$id])) {
            unset($carrinho[$id]);
            session()->put('carrinho', $carrinho);
        }

        return redirect()->route('carrinho.index')->with('success', 'Produto removido do carrinho!');
    }
}
