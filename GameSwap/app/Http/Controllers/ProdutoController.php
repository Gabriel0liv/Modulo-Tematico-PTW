<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleDriveHelper;
use App\Models\Console;
use App\Models\jogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function show($tipo_produto, $id) {
        if ($tipo_produto === 'console') {
            $produto = Console::with(['imagens', 'anunciante'])->findOrFail($id);
            $produto->imagem_capa = $produto->imagens->first()
                ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($produto->imagens->first()->path)
                : '/placeholder.svg';

            // Obter imagens do console
            $imagens = $produto->imagens->map(function ($imagem) {
                return \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($imagem->path);
            });

            // Consoles relacionados
            $produtosRelacionados = Console::where('tipo_console', $produto->tipo_console)
                ->where('id', '!=', $produto->id)
                ->take(4)
                ->get()
                ->map(function ($item) {
                    $item->imagem_capa = $item->imagens->first()
                        ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($item->imagens->first()->path)
                        : '/placeholder.svg';
                    return $item;
                });
        } elseif ($tipo_produto === 'jogo') {
            $produto = Jogo::with(['imagens', 'anunciante'])->findOrFail($id);
            $produto->imagem_capa = $produto->imagens->first()
                ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($produto->imagens->first()->caminho)
                : '/placeholder.svg';

            // Obter imagens do jogo
            $imagens = $produto->imagens->map(function ($imagem) {
                return \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($imagem->caminho);
            });

            // Jogos relacionados
            $produtosRelacionados = Jogo::where('id_categoria', $produto->id_categoria)
                ->where('id', '!=', $produto->id)
                ->take(4)
                ->get()
                ->map(function ($item) {
                    $item->imagem_capa = $item->imagens->first()
                        ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($item->imagens->first()->caminho)
                        : '/placeholder.svg';
                    return $item;
                });
        } else {
            abort(404, 'Tipo de produto não encontrado.');
        }

        // Publicações do mesmo vendedor
        $outrasPublicacoesJogos = Jogo::where('id_anunciante', $produto->id_anunciante)
            ->where('id', '!=', $produto->id)
            ->take(4)
            ->get()
            ->map(function ($item) {
                $item->imagem_capa = $item->imagens->first()
                    ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($item->imagens->first()->caminho)
                    : '/placeholder.svg';
                return $item;
            });

        $outrasPublicacoesConsoles = Console::where('id_anunciante', $produto->id_anunciante)
            ->where('id', '!=', $produto->id)
            ->take(4)
            ->get()
            ->map(function ($item) {
                $item->imagem_capa = $item->imagens->first()
                    ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($item->imagens->first()->path)
                    : '/placeholder.svg';
                return $item;
            });

        $outrasPublicacoes = $outrasPublicacoesJogos->merge($outrasPublicacoesConsoles);

        return view('produto', compact('produto', 'imagens', 'outrasPublicacoes', 'produtosRelacionados'));
    }
    public function destacar($id, Request $request)
    {

        // Verificar o tipo do produto (jogo ou console)
        if ($request->input('tipo_produto') === 'jogo') {
            $produto = \App\Models\Jogo::findOrFail($id);
        } else {
            $produto = \App\Models\Console::findOrFail($id);
        }

        // Atualizar o campo destaque para true
        $produto->destaque = true;
        $produto->save();

        return redirect()->back()->with('success', 'Produto destacado com sucesso!');

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

    public function paginaInicial()
    {
        $userId = Auth::id();

        // Consoles moderados SEM destaque
        $consolesModerados = Console::where('moderado', true)
            ->where(function ($q) {
                $q->where('destaque', false)->orWhereNull('destaque');
            })
            ->when($userId, fn($q) => $q->where('id_anunciante', '!=', $userId))
            ->with('imagens')
            ->inRandomOrder()
            ->limit(6)
            ->get()
            ->map(function ($console) {
                $console->imagem_capa = $console->imagens->first()
                    ? GoogleDriveHelper::transformGoogleDriveUrl($console->imagens->first()->path)
                    : '/placeholder.svg';
                return $console;
            });

        // Jogos moderados SEM destaque
        $jogosModerados = Jogo::where('moderado', true)
            ->where(function ($q) {
                $q->where('destaque', false)->orWhereNull('destaque');
            })
            ->when($userId, fn($q) => $q->where('id_anunciante', '!=', $userId))
            ->with('imagens')
            ->inRandomOrder()
            ->limit(6)
            ->get()
            ->map(function ($jogo) {
                $jogo->imagem_capa = $jogo->imagens->first()
                    ? GoogleDriveHelper::transformGoogleDriveUrl($jogo->imagens->first()->caminho)
                    : '/placeholder.svg';
                return $jogo;
            });

        // Consoles em destaque
        $consolesDestaque = Console::where('moderado', true)
            ->where('destaque', true)
            ->when($userId, fn($q) => $q->where('id_anunciante', '!=', $userId))
            ->with('imagens')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get()
            ->map(function ($console) {
                $console->imagem_capa = $console->imagens->first()
                    ? GoogleDriveHelper::transformGoogleDriveUrl($console->imagens->first()->path)
                    : '/placeholder.svg';
                return $console;
            });

        // Jogos em destaque
        $jogos = Jogo::where('moderado', true)
            ->where('destaque', true)
            ->when($userId, fn($q) => $q->where('id_anunciante', '!=', $userId))
            ->with('imagens')
            ->inRandomOrder()
            ->limit(6)
            ->get()
            ->map(function ($jogo) {
                $jogo->imagem_capa = $jogo->imagens->first()
                    ? GoogleDriveHelper::transformGoogleDriveUrl($jogo->imagens->first()->caminho)
                    : '/placeholder.svg';
                return $jogo;
            });

        return view('compras', compact('consolesDestaque', 'consolesModerados', 'jogos', 'jogosModerados'));
    }
}
