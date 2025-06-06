<?php

namespace App\Http\Controllers;

use App\Models\ModeloConsole;
use Illuminate\Http\Request;

class ModeloConsoleController extends Controller
{
    public function store(Request $request)
    {
        // Valida os dados do request
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);


        return redirect()->route('modelo_consoles.index')->with('success', 'Modelo de console criado com sucesso.');
    }

    public function adicionarModeloConsoles()
    {
        $baseNome = "Novo Modelo";
        $nome = $baseNome;
        $contador = 1;

        // Garante nome único
        while (ModeloConsole::where('nome', $nome)->exists()) {
            $nome = $baseNome . $contador;
            $contador++;
        }

        $modelo_console = new ModeloConsole();
        $modelo_console->nome = $nome;
        $modelo_console->save();

        return redirect()->back()->with('success', 'Modelo de console criado com sucesso');
    }

    public function editarModeloConsoles(Request $request, $id)
    {
        $modelo_console = ModeloConsole::find($id);
        $novoNome = trim($request->input('nome'));

        if (!empty($novoNome)) {
            $modelo_console->nome = $novoNome;
            $modelo_console->save();
            return redirect()->back()->with('success', 'Modelo atualizado com sucesso.');
        } else {
            return redirect()->back()->with('error', 'O nome do modelo não pode estar vazio.');
        }
    }

    public function eliminarModeloConsoles($id)
    {
        $modelo_console = ModeloConsole::find($id);
        if ($modelo_console) {
            $modelo_console->delete();
            return redirect()->back()->with('success', 'Modelo eliminado com sucesso');
        }
        return redirect()->back()->with('error', 'Modelo não encontrado');
    }
}
