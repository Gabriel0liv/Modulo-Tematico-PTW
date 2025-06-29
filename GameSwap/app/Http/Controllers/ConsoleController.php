<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\ImagemConsole;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConsoleController extends Controller
{
    /**
     * Exibe a página de criação de consoles.
     *
     * @return \Illuminate\View\View
     */
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
            ], [
                'nome.required' => 'O nome do console é obrigatório.',
                'nome.max' => 'O nome do console deve ter no máximo 255 caracteres.',
                'modelo_console_id.required' => 'O modelo do console é obrigatório.',
                'modelo_console_id.numeric' => 'O modelo do console deve ser numérico.',
                'preco.required' => 'O preço é obrigatório.',
                'preco.numeric' => 'O preço deve ser numérico.',
                'preco.min' => 'O preço não pode ser negativo.',
                'estado.required' => 'O estado do console é obrigatório.',
                'estado.in' => 'O estado do console deve ser novo, usado ou recondicionado.',
                'descricao.required' => 'A descrição é obrigatória.',
                'descricao.max' => 'A descrição deve ter no máximo 1000 caracteres.',
                'imagens.required' => 'É necessário enviar pelo menos uma imagem.',
                'imagens.*.image' => 'Cada arquivo enviado deve ser uma imagem válida.',
                'imagens.*.mimes' => 'As imagens devem ser do tipo jpeg, png, jpg ou gif.',
                'imagens.*.max' => 'Cada imagem não pode ultrapassar 8MB.',
            ]);

            Log::info('Dados validados com sucesso.', ['validated_data' => $validatedData]);

            // Criação do console
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

            // Upload das imagens no Google Drive (caso existam)
            $client = new \Google_Client();
            $client->setClientId(config('services.google.client_id'));
            $client->setClientSecret(config('services.google.client_secret'));
            $client->refreshToken(config('services.google.refresh_token'));

            $service = new \Google_Service_Drive($client);

            if ($request->hasFile('imagens')) {
                $imagens = $request->file('imagens');
                foreach ($imagens as $imagem) {
                    $filePath = $imagem->getRealPath();
                    $fileName = $imagem->getClientOriginalName();

                    Log::info('Iniciando envio de imagem.', ['file_name' => $fileName]);

                    $uploadedFileUrl = $service->upload($filePath, $fileName, $console->id, 'consoles');

                    Log::info('Upload concluído.', ['uploaded_url' => $uploadedFileUrl]);

                    ImagemConsole::create([
                        'console_id' => $console->id,
                        'path' => $uploadedFileUrl,
                    ]);

                    Log::info('Imagem registrada no banco de dados.', ['console_id' => $console->id, 'path' => $uploadedFileUrl]);
                }
            }

            return redirect()->route('pagina_inicial')->with('success', 'Console anunciado com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Captura todas as mensagens de erro e combina em uma única string
            $mensagensDeErro = [];
            foreach ($e->errors() as $campo => $mensagens) {
                $mensagensDeErro = array_merge($mensagensDeErro, $mensagens);
            }

            return back()->withErrors(['erro' => "Erro ao cadastrar o console: " . implode(', ', $mensagensDeErro)]);
        }
        catch (\Throwable $e) {
            Log::error('Erro ao cadastrar o console.', ['exception' => $e->getMessage()]);
            return back()->withErrors(['erro' => 'Erro inesperado, por favor, tente novamente.']);
        }
    }

    /**
     * Exibe a página de detalhes de um console.
     *
     * @param int $id ID do console.
     * @return \Illuminate\View\View
     */
    public
    function show($id)
    {
        $console = \App\Models\Console::with('imagens')->findOrFail($id);
        return view('consoles.show', compact('console'));
    }


    /**
     * Exibe a página de pesquisa de consoles.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public
    function search(Request $request)
    {
        $query = $request->input('query');
        $consoles = Console::search($query)->paginate(10);

        return view('paginas.pesquisa', compact('consoles', 'query'));
    }
}
