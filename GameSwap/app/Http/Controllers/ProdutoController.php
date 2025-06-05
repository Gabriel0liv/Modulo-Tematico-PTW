<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleDriveHelper;
use App\Models\Categoria;
use App\Models\Console;
use App\Models\jogo;
use App\Models\ModeloConsole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function anunciar()
    {
        $categorias = Categoria::all();
        $modelo_consoles = ModeloConsole::all();
        $jogo = new jogo();
        $console = new Console();

        return view('paginas.anunciar', ['categorias' => $categorias, 'jogo' => $jogo, 'console' => $console, 'modelo_consoles' => $modelo_consoles]);
    }
    public function show($tipo_produto, $id) {
        if ($tipo_produto === 'console') {
            $produto = Console::with(['imagens', 'anunciante'])->findOrFail($id);
            $produto->imagem_capa = $produto->imagens->first()
                ? GoogleDriveHelper::transformGoogleDriveUrl($produto->imagens->first()->path)
                : '/placeholder.svg';

            $imagens = $produto->imagens->map(function ($imagem) {
                return GoogleDriveHelper::transformGoogleDriveUrl($imagem->path);
            });

            // Produtos relacionados (consoles)
            $produtosRelacionados = Console::where('modelo_console_id', $produto->modelo_console_id)
                ->where('id', '!=', $produto->id)
                ->with('imagens')
                ->inRandomOrder()
                ->limit(14)
                ->get()
                ->map(function ($item) {
                    $item->imagem_capa = $item->imagens->first()
                        ? GoogleDriveHelper::transformGoogleDriveUrl($item->imagens->first()->path)
                        : '/placeholder.svg';
                    return $item; // Retorna o OBJETO do modelo
                });
        } elseif ($tipo_produto === 'jogo') {
            $produto = Jogo::with(['imagens', 'anunciante'])->findOrFail($id);
            $produto->imagem_capa = $produto->imagens->first()
                ? GoogleDriveHelper::transformGoogleDriveUrl($produto->imagens->first()->caminho)
                : '/placeholder.svg';

            $imagens = $produto->imagens->map(function ($imagem) {
                return GoogleDriveHelper::transformGoogleDriveUrl($imagem->caminho);
            });

            // Produtos relacionados (jogos)
            $produtosRelacionados = Jogo::where('id_categoria', $produto->id_categoria)
                ->where('id', '!=', $produto->id)
                ->with('imagens')
                ->inRandomOrder()
                ->limit(14)
                ->get()
                ->map(function ($item) {
                    $item->imagem_capa = $item->imagens->first()
                        ? GoogleDriveHelper::transformGoogleDriveUrl($item->imagens->first()->caminho)
                        : '/placeholder.svg';
                    return $item; // Retorna o OBJETO do modelo
                });
        } else {
            abort(404, 'Tipo de produto não encontrado.');
        }

        // Publicações do mesmo vendedor
        $outrasPublicacoes = Jogo::where('id_anunciante', $produto->id_anunciante)
            ->where('id', '!=', $produto->id)
            ->with('imagens')
            ->inRandomOrder()
            ->limit(7)
            ->get()
            ->concat(Console::where('id_anunciante', $produto->id_anunciante)
                ->where('id', '!=', $produto->id)
                ->with('imagens')
                ->inRandomOrder()
                ->limit(7)
                ->get())
            ->shuffle()
            ->take(14) // Garante o limite de 14 itens
            ->map(function ($item) {
                $item->imagem_capa = $item->imagens->first()
                    ? GoogleDriveHelper::transformGoogleDriveUrl($item->imagens->first()->path ?? $item->imagens->first()->caminho)
                    : '/placeholder.svg';
                return $item; // Retorna o OBJETO do modelo
            });

        return view('produto', compact('produto', 'imagens', 'outrasPublicacoes', 'produtosRelacionados'));
    }

    public function destacar($tipo, $id)
    {
        if (!in_array($tipo, ['jogo', 'console'])) {
            abort(404);
        }

        session([
            'tipo_checkout' => 'destacar',
            'valor_checkout' => 4.90,
            'produto_id' => $id,
            'tipo_produto' => $tipo,
        ]);

        return redirect()->route('checkout.index');
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
        $generos = $request->input('generos', []);
        $consolesFiltro = $request->input('consoles', []);
        $modelo_consoles = ModeloConsole::all();
        $categorias = Categoria::all();

        // Busca paginada de Jogos
        $jogosPaginated = Jogo::search($query)->paginate(10);

        // Carrega as imagens dos Jogos para cada item da página
        $jogos = $jogosPaginated->getCollection()->map(function ($jogo) {
            $jogo->load('imagens'); // Carregar imagens relacionadas
            $jogo->imagem_capa = $jogo->imagens->first()
                ? GoogleDriveHelper::transformGoogleDriveUrl($jogo->imagens->first()->caminho)
                : '/placeholder.svg';
            return $jogo;
        });
        // Atualiza a coleção paginada para adicionar a imagem_capa
        $jogosPaginated->setCollection($jogos);

        // Busca paginada de Consoles
        $consolesPaginated = Console::search($query)->paginate(10);

        // Carrega as imagens dos Consoles para cada item da página
        $consoles = $consolesPaginated->getCollection()->map(function ($console) {
            $console->load('imagens'); // Carregar imagens relacionadas
            $console->imagem_capa = $console->imagens->first()
                ? GoogleDriveHelper::transformGoogleDriveUrl($console->imagens->first()->path)
                : '/placeholder.svg';
            return $console;
        });
        // Atualiza a coleção paginada para adicionar a imagem_capa
        $consolesPaginated->setCollection($consoles);

        // Retornar view com os dados paginados
        return view('paginas.pesquisa', [
            'jogos' => $jogosPaginated,
            'consoles' => $consolesPaginated,
            'query' => $query,
            'modelo_consoles' => $modelo_consoles,
            'categorias' => $categorias
        ]);
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
            ->whereNull('id_comprador')
            ->where(function ($q) {
                $q->where('destaque', false)->orWhereNull('destaque');
            })
            ->when($userId, fn($q) => $q->where('id_anunciante', '!=', $userId))
            ->with('imagens')
            ->inRandomOrder()
            ->limit(12)
            ->get()
            ->map(function ($console) {
                $console->imagem_capa = $console->imagens->first()
                    ? GoogleDriveHelper::transformGoogleDriveUrl($console->imagens->first()->path)
                    : '/placeholder.svg';
                return $console;
            });

        // Jogos moderados SEM destaque
        $jogosModerados = Jogo::where('moderado', true)
            ->whereNull('id_comprador')
            ->where(function ($q) {
                $q->where('destaque', false)->orWhereNull('destaque');
            })
            ->when($userId, fn($q) => $q->where('id_anunciante', '!=', $userId))
            ->with('imagens')
            ->inRandomOrder()
            ->limit(12)
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
            ->whereNull('id_comprador')
            ->when($userId, fn($q) => $q->where('id_anunciante', '!=', $userId))
            ->with('imagens')
            ->orderBy('created_at', 'desc')
            ->limit(14)
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
            ->whereNull('id_comprador')
            ->when($userId, fn($q) => $q->where('id_anunciante', '!=', $userId))
            ->with('imagens')
            ->orderBy('created_at', 'desc')
            ->limit(14)
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
