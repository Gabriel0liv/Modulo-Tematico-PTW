<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use App\Models\ModeloConsole;
use Illuminate\Http\Request;
use App\Models\jogo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\GoogleDriveService;

class JogoController extends Controller
{
    /**
     * Exibe a página inicial de produtos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('produtos.index');
    }

    /**
     * Exibe o formulário para anunciar um novo jogo.
     *
     * @return \Illuminate\Http\RedirectResponse
     */




    public function store(Request $request)
    {
        Log::debug('[STORE] Iniciando processo de criação de jogo.', [
            'user_id' => auth()->id(),
            'request_data' => $request->all()
        ]);

        try {

            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
                'preco' => 'required|numeric|min:0',
                'estado' => 'required|in:novo,usado,recondicionado',
                'id_categoria' => 'required|exists:categorias,id',
                'descricao' => 'required|string|max:1000',
                'console_id' => 'required|exists:modelo_consoles,id',
                'regiao' => 'required|string|max:255',
                'destaque' => 'nullable|boolean',
                'imagens' => 'required|array',
                'imagens.*' => 'image|mimes:jpeg,png,jpg,gif|max:8192',
            ]);

            Log::debug('[STORE] Dados validados com sucesso.', $validatedData);

            $jogo = Jogo::create([
                'nome' => $validatedData['nome'],
                'descricao' => $validatedData['descricao'],
                'preco' => $validatedData['preco'],
                'id_categoria' => $validatedData['id_categoria'],
                'estado' => $validatedData['estado'],
                'tipo_produto' => $request->input('tipo_produto', 'jogo'),
                'id_anunciante' => auth()->id(),
                'console_id' => $validatedData['console_id'],
                'regiao' => $validatedData['regiao'],
                'destaque' => $request->boolean('destaque'),
            ]);

            Log::debug('[STORE] Jogo criado com ID ' . $jogo->id);

            $googleDriveService = new \App\Services\GoogleDriveService();

            if ($request->hasFile('imagens')) {
                foreach ($request->file('imagens') as $imagem) {
                    Log::debug('[STORE] Enviando imagem: ' . $imagem->getClientOriginalName());

                    $uploadedFileUrl = $googleDriveService->upload(
                        $imagem->getRealPath(),
                        $imagem->getClientOriginalName(),
                        $jogo->id,
                        'jogos'
                    );

                    Log::debug('[STORE] Imagem enviada para: ' . $uploadedFileUrl);

                    Imagem::create([
                        'jogo_id' => $jogo->id,
                        'caminho' => $uploadedFileUrl,
                    ]);
                }
            }

            Log::info('[STORE] Jogo cadastrado com sucesso.');

            return redirect()->route('pagina_inicial')->with('success', 'Jogo anunciado com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {

            Log::error('[STORE] Erro de validação.', ['errors' => $e->errors()]);

            return back()->withErrors([
                'erro' => "Erro ao cadastrar o jogo: " . implode(', ', array_merge(...array_values($e->errors())))
            ]);
        } catch (\Throwable $e) {

            Log::error('[STORE] Erro inesperado.', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->withErrors(['erro' => 'Erro inesperado, por favor, tente novamente.']);
        }
    }


    /**
     * Exibe os detalhes de um jogo específico.
     *
     * @param int $id ID do jogo
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $produto = jogo::findOrFail($id);
        $produtosRelacionados = jogo::where('tipo_produto', $produto->tipo_produto)
            ->where('id', '!=', $produto->id)
            ->take(4)
            ->get();

        $imagemCapa = $produto->imagens->first() ? $produto->imagens->first()->caminho : '/placeholder.svg';

        return view('produto', compact('produto', 'produtosRelacionados', 'imagemCapa'));
    }

    /**
     * Exibe os jogos em destaque.
     *
     * @return \Illuminate\View\View
     */
    public function jogosEmDestaque()
    {
        $jogos = \App\Models\jogo::where('moderado', true)
            ->where('destaque', true)
            ->inRandomOrder()
            ->get()
            ->map(function ($jogo) {
                $jogo->imagem_capa = $jogo->imagens->first()
                    ? $this->transformGoogleDriveUrl($jogo->imagens->first()->caminho)
                    : '/placeholder.svg';
                return $jogo;
            });

        return view('compras', compact('jogos'));
    }


    /**
     * Exibe a página de pesquisa de jogos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $jogos = jogo::search($query)->paginate(10);

        return view('paginas.pesquisa', compact('jogos', 'query'));
    }

    /**
     * Exibe o formulário para enviar um comentário.
     *
     * @return \Illuminate\View\View
     */
    public function searchSuggestions(Request $request)
    {
        $query = $request->input('query');
        $jogos = jogo::search($query)->take(5)->get();

        return response()->json($jogos);
    }
}
