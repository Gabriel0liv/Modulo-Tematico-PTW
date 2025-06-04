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
    public function index()
    {
        return view('produtos.index');
    }

    public function store(Request $request)
    {
        Log::info('teste');

        try {
            Log::info('[JogoController@store] Iniciando o processo de cadastro de jogo.', [
                'user_id' => auth()->id(),
                'files_names' => $request->hasFile('imagens') ? array_map(fn($f) => $f->getClientOriginalName(), $request->file('imagens')) : null,
                'all_inputs' => $request->all(),
            ]);

            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
                'preco' => 'required|numeric|min:0',
                'estado' => 'required|in:novo,usado,recondicionado',
                'id_categoria' => 'required|exists:categorias,id',
                'descricao' => 'required|string|max:1000',
                'destaque' => 'nullable|boolean',
                'imagens' => 'required|array',
                'imagens.*' => 'image|mimes:jpeg,png,jpg,gif|max:8192',
            ]);

            $jogo = Jogo::create([
                'nome' => $validatedData['nome'],
                'descricao' => $validatedData['descricao'],
                'preco' => $validatedData['preco'],
                'id_categoria' => $validatedData['id_categoria'],
                'estado' => $validatedData['estado'],
                'tipo_produto' => $request->input('tipo_produto', 'jogo'),
                'id_anunciante' => auth()->id(),
                'console_id' => $request->input('console_id'),
                'destaque' => $request->boolean('destaque'),
            ]);

            Log::info('Jogo criado com sucesso.', ['jogo_id' => $jogo->id]);

            $googleDriveService = new GoogleDriveService();

            if ($request->hasFile('imagens')) {
                $imagens = $request->file('imagens');
                foreach ($imagens as $imagem) {
                    $filePath = $imagem->getRealPath();
                    $fileName = $imagem->getClientOriginalName();

                    Log::info('Iniciando upload da imagem.', ['file_name' => $fileName]);

                    $uploadedFileUrl = $googleDriveService->upload($filePath, $fileName, $jogo->id, 'jogos');

                    Log::info('Imagem enviada com sucesso.', ['uploaded_url' => $uploadedFileUrl]);

                    Imagem::create([
                        'jogo_id' => $jogo->id,
                        'caminho' => $uploadedFileUrl,
                    ]);

                    Log::info('Registro da imagem criado no banco de dados.', ['jogo_id' => $jogo->id, 'path' => $uploadedFileUrl]);
                }
            }

            return redirect()->route('pagina_inicial')->with('success', 'Jogo anunciado com sucesso!');
        } catch (\Throwable $e) {
            Log::error('Erro ao cadastrar o jogo.', ['exception' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Ocorreu um erro ao cadastrar o jogo.']);
        }
    }


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


    public function search(Request $request)
    {
        $query = $request->input('query');
        $jogos = Jogo::search($query)->paginate(10);

        return view('paginas.pesquisa', compact('jogos', 'query'));
    }

    public function searchSuggestions(Request $request)
    {
        $query = $request->input('query');
        $jogos = Jogo::search($query)->take(5)->get();

        return response()->json($jogos);
    }
}
