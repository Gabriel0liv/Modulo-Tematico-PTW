<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\jogo;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function show($tipo_produto, $id)
    {
        if ($tipo_produto === 'jogo') {
            $produto = Jogo::with('anunciante')->findOrFail($id);
        } else {
            $produto = Console::with('anunciante')->findOrFail($id);
        }

        // Exemplo de produtos relacionados (ajuste conforme sua lógica)
        $produtosRelacionados = jogo::where('tipo_produto', $produto->tipo_produto)
            ->where('id', '!=', $produto->id)
            ->take(4)
            ->get();

        return view('produto', compact('produto', 'produtosRelacionados'));
    }
    public function aprovarAnuncios(Request $request)
    {
        $jogos = Jogo::all();
        $consoles = Console::all();

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

    public function search(Request $request)
    {
        $query = $request->input('query');

        $jogos = Jogo::search($query)->paginate(10);
        $consoles = Console::search($query)->paginate(10);

        return view('paginas.pesquisa', compact('jogos', 'consoles', 'query'));
    }
    public function searchSuggestions(Request $request)
    {
        $query = $request->input('query');
        $jogos = Jogo::search($query)->take(5)->get();
        $consoles = Console::search($query)->take(5)->get();

        // Unir resultados
        $produtos = $jogos->merge($consoles);

        return response()->json($produtos);
    }
}
