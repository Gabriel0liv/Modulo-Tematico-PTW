<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleDriveHelper;
use App\Models\Categoria;
use App\Models\Console;
use App\Models\jogo;
use App\Models\ModeloConsole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class ProdutoController extends Controller
{
    /**
     * Exibe a página de anúncio de produtos.
     *
     * @return \Illuminate\View\View
     */
    public function anunciar()
    {
        $categorias = Categoria::all();
        $modelo_consoles = ModeloConsole::all();
        $jogo = new jogo();
        $console = new Console();

        return view('paginas.anunciar', ['categorias' => $categorias, 'jogo' => $jogo, 'console' => $console, 'modelo_consoles' => $modelo_consoles]);
    }

    /**
     * Exibe os detalhes de um produto específico.
     *
     * @param string $tipo_produto
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($tipo_produto, $id) {
        if ($tipo_produto === 'console') {
            $produto = Console::with(['imagens', 'anunciante'])->findOrFail($id);
            $produto->imagem_capa = $produto->imagens->first()
                ? GoogleDriveHelper::transformGoogleDriveUrl($produto->imagens->first()->path)
                : '/placeholder.svg';

            $imagens = $produto->imagens->map(function ($imagem) {
                return GoogleDriveHelper::transformGoogleDriveUrl($imagem->path);
            });

            $produto->regiao = $produto->regiao ?? 'Região não especificada';


            // Produtos relacionados (consoles)
            $produtosRelacionados = Console::where('modelo_console_id', $produto->modelo_console_id)
                ->where('id', '!=', $produto->id)
                ->when(auth()->check(), function ($query) {
                    return $query->where('id_anunciante', '!=', auth()->id());
                })
                ->with('imagens')
                ->inRandomOrder()
                ->limit(14)
                ->get()
                ->map(function ($item) {
                    $item->imagem_capa = $item->imagens->first()
                        ? GoogleDriveHelper::transformGoogleDriveUrl($item->imagens->first()->path)
                        : '/placeholder.svg';
                    return $item;
                });
        } elseif ($tipo_produto === 'jogo') {
            $produto = Jogo::with(['imagens', 'anunciante', 'modelo_console'])->findOrFail($id); // Incluímos 'modelo_console'
            $produto->imagem_capa = $produto->imagens->first()
                ? GoogleDriveHelper::transformGoogleDriveUrl($produto->imagens->first()->caminho)
                : '/placeholder.svg';

            $imagens = $produto->imagens->map(function ($imagem) {
                return GoogleDriveHelper::transformGoogleDriveUrl($imagem->caminho);
            });

            // Produtos relacionados (jogos)
            $produtosRelacionados = Jogo::where('console_id', $produto->console_id)
                ->where('id', '!=', $produto->id)
                ->whereNull('id_comprador')
                ->when(auth()->check(), function ($query) {
                    return $query->where('id_anunciante', '!=', auth()->id());
                })
                ->with('imagens')
                ->inRandomOrder()
                ->limit(14)
                ->get()
                ->map(function ($item) {
                    $item->imagem_capa = $item->imagens->first()
                        ? GoogleDriveHelper::transformGoogleDriveUrl($item->imagens->first()->path ?? $item->imagens->first()->caminho)
                        : '/placeholder.svg';
                    return $item;
                });

            // Adicionado para garantir que o nome do console esteja disponível
            $produto->nome_console = $produto->modelo_console ? $produto->modelo_console->nome : 'Console não especificado';
        } else {
            abort(404, 'Tipo de produto não encontrado.');
        }

        // Publicações do mesmo vendedor
        $outrasPublicacoes = Jogo::where('id_anunciante', $produto->id_anunciante)
            ->where('id', '!=', $produto->id)
            ->whereNull('id_comprador')
            ->with('imagens')
            ->inRandomOrder()
            ->limit(7)
            ->get()
            ->concat(Console::where('id_anunciante', $produto->id_anunciante)
                ->where('id', '!=', $produto->id)
                ->whereNull('id_comprador')
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

    /**
     * Destaca um produto (jogo ou console) por um valor fixo.
     *
     * @param string $tipo
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Exibe a página de aprovação de anúncios para administradores.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function aprovarAnuncios(Request $request)
    {
        $jogos = Jogo::get()->filter(function ($jogo) {
            return $jogo->id_comprador === null; // Filtra jogos que ainda não foram comprados
        });
        $consoles = Console::get()->filter(function ($console) {
            return $console->id_comprador === null; // Filtra consoles que ainda não foram comprados
        });

        $produtos = $jogos->merge($consoles);

        $pendentes = $produtos->filter(fn($p) => $p->moderado == 0)->values();
        $aprovados = $produtos->filter(fn($p) => $p->moderado == 1)->values();
        $rejeitados = $produtos->filter(fn($p) => $p->moderado == 2)->values();

        $perPage = 10;
        $pendentesPaginator = new LengthAwarePaginator(
            $pendentes->slice(($request->input('pendentes_page', 1) - 1) * $perPage, $perPage)->values(),
            $pendentes->count(),
            $perPage,
            $request->input('pendentes_page', 1),
            ['pageName' => 'pendentes_page', 'path' => $request->url(), 'query' => $request->query()]
        );
        $aprovadosPaginator = new LengthAwarePaginator(
            $aprovados->slice(($request->input('aprovados_page', 1) - 1) * $perPage, $perPage)->values(),
            $aprovados->count(),
            $perPage,
            $request->input('aprovados_page', 1),
            ['pageName' => 'aprovados_page', 'path' => $request->url(), 'query' => $request->query()]
        );
        $rejeitadosPaginator = new LengthAwarePaginator(
            $rejeitados->slice(($request->input('rejeitados_page', 1) - 1) * $perPage, $perPage)->values(),
            $rejeitados->count(),
            $perPage,
            $request->input('rejeitados_page', 1),
            ['pageName' => 'rejeitados_page', 'path' => $request->url(), 'query' => $request->query()]
        );

        return view('paginas.perfilAdmin.aprovar', [
            'pendentes' => $pendentesPaginator,
            'aprovados' => $aprovadosPaginator,
            'rejeitados' => $rejeitadosPaginator,
        ]);
    }

    /**
     * Aprova ou reprova um produto (jogo ou console).
     *
     * @param int $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function aprovar($id, Request $request)
    {
        $tipoProduto = $request->input('tipo_produto');

        if ($tipoProduto === 'jogo') {
            $produto = Jogo::findOrFail($id);
            if ($produto->id_comprador !== null) {
                return redirect()->back()->with('error', 'Produto já foi comprado.');
            }
        } else {
            $produto = Console::findOrFail($id);
            if ($produto->id_comprador !== null) {
                return redirect()->back()->with('error', 'Produto já foi comprado.');
            }
        }

        $produto->moderado = 1;
        $produto->save();

        return redirect()->back()->with('success', 'Produto aprovado com sucesso!');
    }

    /**
     * Reprova um produto (jogo ou console).
     *
     * @param int $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reprovar($id, Request $request)
    {
        $tipoProduto = $request->input('tipo_produto');

        if ($tipoProduto === 'jogo') {
            $produto = Jogo::findOrFail($id);
            if ($produto->id_comprador !== null) {
                return redirect()->back()->with('error', 'Produto já foi comprado.');
            }
        } else {
            $produto = Console::findOrFail($id);
            if ($produto->id_comprador !== null) {
                return redirect()->back()->with('error', 'Produto já foi comprado.');
            }
        }

        $produto->moderado = 2;
        $produto->save();

        return redirect()->back()->with('success', 'Produto reprovado com sucesso!');
    }

    /**
     * Pesquisa por jogos e consoles com base em critérios fornecidos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $categoriaId = $request->input('genero');
        $categorias = Categoria::all();
        $modelo_consolesId = $request->input('modelo');
        $modelo_consoles = ModeloConsole::all();
        $tipo = $request->input('tipo');

        if ($tipo === 'console') {
            $jogosPaginated = collect([]); // Nenhum jogo
            $consolesQuery = empty($query) ? Console::query() : Console::search($query);
        } elseif ($tipo === 'jogo') {
            $consolesPaginated = collect([]); // Nenhum console
            $jogosQuery = empty($query) ? Jogo::query() : Jogo::search($query);
        } else {
            $jogosQuery = empty($query) ? Jogo::query() : Jogo::search($query);
            $consolesQuery = empty($query) ? Console::query() : Console::search($query);
        }

        if (isset($jogosQuery)) {
            if ($categoriaId) {
                $jogosQuery->where('id_categoria', $categoriaId);
            }
            if ($modelo_consolesId) {
                $jogosQuery->where('console_id', $modelo_consolesId);
            }

            $jogosCollection = $jogosQuery->get()
                ->filter(fn($item) => $item->ativo == 1)
                ->sortByDesc('destaque')
                ->values();

            $page = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 10;
            $items = $jogosCollection->slice(($page - 1) * $perPage, $perPage)->values();
            $jogosPaginated = new LengthAwarePaginator(
                $items,
                $jogosCollection->count(),
                $perPage,
                $page,
                ['path' => $request->url(), 'query' => $request->query()]
            );

            $jogosPaginated->getCollection()->transform(function ($jogo) {
                $jogo->load('imagens');
                $jogo->imagem_capa = $jogo->imagens->first()
                    ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($jogo->imagens->first()->caminho)
                    : '/placeholder.svg';
                return $jogo;
            });
        }

        if (isset($consolesQuery)) {
            if ($modelo_consolesId) {
                $consolesQuery->where('modelo_console_id', $modelo_consolesId);
            }
            $consolesCollection = $consolesQuery->get()
                ->filter(fn($item) => $item->ativo == 1)
                ->sortByDesc('destaque')
                ->values();

            $page = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 10;
            $items = $consolesCollection->slice(($page - 1) * $perPage, $perPage)->values();
            $consolesPaginated = new LengthAwarePaginator(
                $items,
                $consolesCollection->count(),
                $perPage,
                $page,
                ['path' => $request->url(), 'query' => $request->query()]
            );

            $consolesPaginated->getCollection()->transform(function ($console) {
                $console->load('imagens');
                $console->imagem_capa = $console->imagens->first()
                    ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($console->imagens->first()->path)
                    : '/placeholder.svg';
                return $console;
            });
        }

        return view('paginas.pesquisa', [
            'jogos' => $jogosPaginated ?? collect([]),
            'consoles' => $consolesPaginated ?? collect([]),
            'query' => $query,
            'categorias' => $categorias,
            'modelo_consoles' => $modelo_consoles
        ]);
    }

    /**
     * Retorna sugestões de pesquisa para jogos e consoles.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchSuggestions(Request $request)
    {
        $query = $request->input('query');
        $jogos = Jogo::search($query)->take(5)->get();
        $consoles = Console::search($query)->take(5)->get();

        // Unir resultados
        $produtos = $jogos->merge($consoles);

        return response()->json($produtos);
    }

    /**
     * Exibe a página inicial com produtos destacados e moderados.
     *
     * @return \Illuminate\View\View
     */
    public function paginaInicial()
    {
        $userId = Auth::id();

        // Consoles moderados SEM destaque
        $consolesModerados = Console::where('moderado', true)
            ->where('ativo', 1)
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
            ->where('ativo', 1)
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
            ->where('ativo', 1)
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
            ->where('ativo', 1)
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

    /**
     * Desativa um anúncio de produto (jogo ou console).
     *
     * @param \Illuminate\Http\Request $request
     * @param string $tipo Tipo do produto ('jogo' ou 'console')
     * @param int $id ID do produto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function desativarAnuncio(Request $request, $tipo, $id){
        if ($tipo === 'jogo') {
            $produto = Jogo::findOrFail($id);
        } elseif ($tipo === 'console') {
            $produto = Console::findOrFail($id);
        } else {
            abort(404, 'Tipo de produto inválido.');
        }

        $produto->ativo = 0; // Desativa o anúncio
        $produto->save();

        return redirect()->back()->with('success', 'Anúncio desativado com sucesso!');
    }
}
