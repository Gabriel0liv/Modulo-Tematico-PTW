<?php

namespace App\Http\Controllers;

use App\Models\Console;
use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo_console' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'estado' => 'required|in:novo,usado,recondicionado',
            'descricao' => 'required|string|max:1000',
            'destaque' => 'nullable|boolean',
            // outros campos se necessário
        ]);

        Console::create([
            'nome' => $validatedData['nome'],
            'tipo_produto' => 'console',
            'tipo_console' => $validatedData['tipo_console'],
            'preco' => $validatedData['preco'],
            'id_anunciante' => auth()->id(),
            'moderado' => false,
            'destaque' => $request->boolean('destaque'),
            'descricao' => $validatedData['descricao'],
            'estado' => $validatedData['estado'],
        ]);

        return redirect()->route('pagina_inicial')->with('success', 'Console anunciado com sucesso!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $consoles = Console::search($query)->paginate(10);

        return view('paginas.pesquisa', compact('consoles', 'query'));
    }
}
