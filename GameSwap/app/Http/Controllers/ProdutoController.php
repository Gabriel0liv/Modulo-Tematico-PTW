<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\jogo;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function aprovarAnuncios(Request $request)
    {
        $jogos = Jogo::where('moderado', 0)->get();
        $consoles = Console::where('moderado', 0)->get();

        $produtos = $jogos->merge($consoles);

        return view('paginas.perfilAdmin.aprovar', ['produtos' => $produtos]);
    }

    public function aprovar($id, Request $request)
    {
        $tipoProduto = $request->input('tipo_produto');

        if ($tipoProduto === 'jogo') {
            $produto = Jogo::findOrFail($id);
        } else {
            $produto = Console::findOrFail($id);
        }

        $produto->moderado = 1;
        $produto->save();

        return redirect()->back()->with('success', 'Produto aprovado com sucesso!');
    }

    public function reprovar($id, Request $request)
    {
        $tipoProduto = $request->input('tipo_produto');

        if ($tipoProduto === 'jogo') {
            $produto = Jogo::findOrFail($id);
        } else {
            $produto = Console::findOrFail($id);
        }

        $produto->moderado = 2;
        $produto->save();

        return redirect()->back()->with('success', 'Produto reprovado com sucesso!');
    }
}
