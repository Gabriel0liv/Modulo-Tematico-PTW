<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use App\Models\ModeloConsole;
use Illuminate\Http\Request;
use App\Models\jogo;
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
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        try {
            Log::info('Iniciando o processo de validação para cadastro do jogo.', [
                'user_id' => auth()->id(),
                'request_data' => $request->all(),
            ]);

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
            ], [
                'nome.required' => 'O nome do jogo é obrigatório.',
                'nome.max' => 'O nome do jogo deve ter no máximo 255 caracteres.',
                'preco.required' => 'O preço é obrigatório.',
                'preco.numeric' => 'O preço deve ser numérico.',
                'preco.min' => 'O preço não pode ser negativo.',
                'estado.required' => 'O estado é obrigatório.',
                'estado.in' => 'O estado deve ser novo, usado ou recondicionado.',
                'id_categoria.required' => 'A categoria é obrigatória.',
                'id_categoria.exists' => 'A categoria selecionada não é válida.',
                'descricao.required' => 'A descrição é obrigatória.',
                'descricao.max' => 'A descrição deve ter no máximo 1000 caracteres.',
                'console_id.required' => 'O console é obrigatório.',
                'console_id.exists' => 'O console selecionado não é válido.',
                'regiao.required' => 'A região é obrigatória.',
                'regiao.max' => 'A região deve ter no máximo 255 caracteres.',
                'imagens.required' => 'Pelo menos uma imagem deve ser enviada.',
                'imagens.*.image' => 'Cada arquivo deve ser uma imagem válida.',
                'imagens.*.mimes' => 'As imagens devem ser do tipo jpeg, png, jpg ou gif.',
                'imagens.*.max' => 'Cada imagem não pode exceder 8MB.',
            ]);

            // Criar o jogo
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

            // Upload imagens
            $googleDriveService = new GoogleDriveService();

            if ($request->hasFile('imagens')) {
                foreach ($request->file('imagens') as $imagem) {
                    $uploadedFileUrl = $googleDriveService->upload(
                        $imagem->getRealPath(),
                        $imagem->getClientOriginalName(),
                        $jogo->id,
                        'jogos'
                    );

                    Imagem::create([
                        'jogo_id' => $jogo->id,
                        'caminho' => $uploadedFileUrl,
                    ]);
                }
            }

            return redirect()->route('pagina_inicial')->with('success', 'Jogo anunciado com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Captura todas as mensagens de erro e combina em uma única string
            $mensagensDeErro = [];
            foreach ($e->errors() as $campo => $mensagens) {
                $mensagensDeErro = array_merge($mensagensDeErro, $mensagens);
            }

            return back()->withErrors(['erro' => "Erro ao cadastrar o jogo: " . implode(', ', $mensagensDeErro)]);
        } catch (\Throwable $e) {
            Log::error('Erro ao cadastrar o jogo.', ['exception' => $e->getMessage()]);
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
        $jogos = \App\Models\Jogo::where('moderado', true)
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
        $jogos = Jogo::search($query)->paginate(10);

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
        $jogos = Jogo::search($query)->take(5)->get();

        return response()->json($jogos);
    }
}
