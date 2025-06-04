<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\ImagemConsole;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConsoleController extends Controller
{
    public function store(Request $request)
    {
        try {
            Log::info('Iniciando validação dos dados do formulário.', ['request_data' => $request->all()]);

            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
                'modelo_console_id' => 'required|numeric',
                'preco' => 'required|numeric|min:0',
                'estado' => 'required|in:novo,usado,recondicionado',
                'descricao' => 'required|string|max:1000',
                'destaque' => 'nullable|boolean',
                'imagens' => 'required|array',
                'imagens.*' => 'image|mimes:jpeg,png,jpg,gif|max:8192',
            ]);
            Log::info('Dados validados com sucesso.', ['validated_data' => $validatedData]);

            $console = Console::create([
                'nome' => $validatedData['nome'],
                'tipo_produto' => 'console',
                'modelo_console_id' => $validatedData['modelo_console_id'],
                'preco' => $validatedData['preco'],
                'id_anunciante' => auth()->id(),
                'moderado' => false,
                'destaque' => $request->boolean('destaque'),
                'descricao' => $validatedData['descricao'],
                'estado' => $validatedData['estado'],
            ]);

            Log::info('Console criado com sucesso.', ['console_id' => $console->id]);

            $googleDriveService = new GoogleDriveService();

            if ($request->hasFile('imagens')) {
                $imagens = $request->file('imagens');
                foreach ($imagens as $imagem) {
                    $filePath = $imagem->getRealPath();
                    $fileName = $imagem->getClientOriginalName();

                    Log::info('Iniciando upload da imagem.', ['file_name' => $fileName]);

                    $uploadedFileUrl = $googleDriveService->upload($filePath, $fileName, $console->id, 'consoles');

                    Log::info('Imagem enviada com sucesso.', ['uploaded_url' => $uploadedFileUrl]);

                    ImagemConsole::create([
                        'console_id' => $console->id,
                        'path' => $uploadedFileUrl,
                    ]);
                    Log::info('Registro da imagem criado no banco de dados.', ['console_id' => $console->id, 'path' => $uploadedFileUrl]);
                }
            }

            return redirect()->route('pagina_inicial')->with('success', 'Console anunciado com sucesso!');
        } catch (\Throwable $e) {
            Log::error('Erro ao cadastrar o console.', ['exception' => $e->getMessage()]);
            return back()->withErrors(['erro' => 'Ocorreu um erro ao cadastrar o console.']);
        }
    }




public
function show($id)
{
    $console = \App\Models\Console::with('imagens')->findOrFail($id);
    return view('consoles.show', compact('console'));
}


public
function search(Request $request)
{
    $query = $request->input('query');
    $consoles = Console::search($query)->paginate(10);

    return view('paginas.pesquisa', compact('consoles', 'query'));
}
}
