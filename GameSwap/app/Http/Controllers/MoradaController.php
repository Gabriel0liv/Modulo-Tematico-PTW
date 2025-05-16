<?php

namespace App\Http\Controllers;

use App\Models\Concelho;
use App\Models\Distrito;
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

    public function index(Request $request)
    {
        $distritos = Distrito::all();
        $concelhos = [];

        if ($request->filled('distrito')) {
            $concelhos = Concelho::where('distrito', $request->input('distrito'))->get();
        }

        return view('paginas.adicionarMorada', compact('distritos', 'concelhos'));
    }

    public function getDistritos()
    {
        $distritos = Distrito::all();
        return view('moradas.create', compact('distritos'));
    }

    public function obterConcelhosPorDistrito($distritoId)
    {
        $concelhos = Concelho::where('distrito_id', $distritoId)->get();

        return response()->json($concelhos);
    }


}
