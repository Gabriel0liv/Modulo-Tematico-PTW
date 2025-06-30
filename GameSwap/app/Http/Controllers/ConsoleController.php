<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\Imagem;
use App\Models\ImagemConsole;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ConsoleController extends Controller
{
    /**
     * Exibe a página de criação de consoles.
     *
     * @return \Illuminate\View\View
     */
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;

    public function store(Request $request)
    {
        Log::debug('[STORE_CONSOLE] Iniciando criação de console.', [
            'user_id' => auth()->id(),
            'request_data' => $request->all()
        ]);

        try {
            DB::beginTransaction();

            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
                'preco' => 'required|numeric|min:0',
                'estado' => 'required|in:novo,usado,recondicionado',
                'descricao' => 'required|string|max:1000',
                'modelo_console_id' => 'required|exists:modelo_consoles,id',
                'regiao' => 'required|string|max:255',
                'destaque' => 'nullable|boolean',
                'imagens' => 'required|array',
                'imagens.*' => 'image|mimes:jpeg,png,jpg,gif|max:8192',
            ]);

            Log::debug('[STORE_CONSOLE] Validação OK.', $validatedData);

            $console = Console::create([
                'nome' => $validatedData['nome'],
                'descricao' => $validatedData['descricao'],
                'preco' => $validatedData['preco'],
                'modelo_console_id' => $validatedData['modelo_console_id'],
                'estado' => $validatedData['estado'],
                'id_anunciante' => auth()->id(),
                'regiao' => $validatedData['regiao'],
                'destaque' => $request->boolean('destaque'),
            ]);

            Log::debug('[STORE_CONSOLE] Console criado com ID: ' . $console->id);

            $googleDriveService = new \App\Services\GoogleDriveService();

            if ($request->hasFile('imagens')) {
                foreach ($request->file('imagens') as $imagem) {
                    Log::debug('[STORE_CONSOLE] Enviando imagem: ' . $imagem->getClientOriginalName());

                    $uploadedFileUrl = $googleDriveService->upload(
                        $imagem->getRealPath(),
                        $imagem->getClientOriginalName(),
                        $console->id,
                        'consoles'
                    );

                    Log::debug('[STORE_CONSOLE] Imagem enviada: ' . $uploadedFileUrl);

                    Imagem::create([
                        'console_id' => $console->id,
                        'caminho' => $uploadedFileUrl,
                    ]);
                }
            }

            DB::commit();
            Log::info('[STORE_CONSOLE] Console cadastrado com sucesso.');

            return redirect()->route('pagina_inicial')->with('success', 'Console anunciado com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error('[STORE_CONSOLE] Erro de validação.', ['errors' => $e->errors()]);

            return back()->withErrors([
                'erro' => "Erro ao cadastrar o console: " . implode(', ', array_merge(...array_values($e->errors())))
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('[STORE_CONSOLE] Erro inesperado.', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

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
