<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoradaController extends Controller
{
    public function editarMorada(Request $request, $id)
    {
        $validated = $request->validate([
            'nome_morada' => 'required|string|max:255',
            'morada' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:255',
            'localidade' => 'required|string|max:255',
            'distrito' => 'required|string|max:255',
        ]);

        $morada = Auth::user()->moradas()->where('id', $id)->first();

        if (!$morada) {
            abort(404, 'Morada não encontrada ou não pertence a este utilizador.');
        }

        $morada->update($validated);

        return redirect()->route('perfil.moradas');
    }

    public function editarForm($id)
    {
        $morada = Auth::user()->moradas()->where('id', $id)->firstOrFail();
        return view('paginas.editarMorada', compact('morada'));
    }

    public function apagarMorada($id)
    {
        $morada = Auth::user()->moradas()->where('id', $id)->first();

        if (!$morada) {
            abort(404, 'Morada não encontrada ou não pertence a este utilizador.');
        }

        $morada->delete();

        return redirect()->route('perfil.moradas')->with('success', 'Morada apagada com sucesso.');
    }
}
