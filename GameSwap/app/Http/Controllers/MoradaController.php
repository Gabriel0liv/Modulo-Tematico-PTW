<?php

namespace App\Http\Controllers;

use App\Models\Concelho;
use App\Models\Distrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoradaController extends Controller
{
    /**
     * Exibe o formulário para adicionar uma nova morada.
     *
     * @return \Illuminate\View\View
     */
    public function editarMorada(Request $request, $id)
    {
        $validated = $request->validate([
            'morada' => 'required|string|max:255',
            // Código Postal no formato 0000-000
            'codigo_postal' => [
                'required',
                'regex:/^\d{4}-\d{3}$/'
            ],
            'distrito_id' => 'required|exists:distritos,id',
            'concelho_id' => 'required|exists:concelhos,id',
            'nome_morada' => 'required|string|max:255',
        ]);

        $morada = Auth::user()->moradas()->where('id', $id)->first();

        if (!$morada) {
            abort(404, 'Morada não encontrada ou não pertence a este utilizador.');
        }

        $morada->update($validated);

        return redirect()->route('perfil.moradas')->with('success', 'Morada atualizada com sucesso');
    }

    /**
     * Exibe o formulário para adicionar uma nova morada.
     *
     * @return \Illuminate\View\View
     */
    public function editarForm($id)
    {
        $morada = Auth::user()->moradas()->where('id', $id)->firstOrFail();
        $distritos = Distrito::all(); // Carrega os distritos
        return view('paginas.editarMorada', compact('morada', 'distritos'));
    }

    /**
     * Armazena uma nova morada.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apagarMorada($id)
    {
        $morada = Auth::user()->moradas()->where('id', $id)->first();

        if (is_null($morada)) {
            return redirect()->route('perfil.moradas')->withErrors('Morada não encontrada ou não pertence a este utilizador.');
        }

        $morada->ativo = false;
        $morada->save();

        return redirect()->route('perfil.moradas')->with('success', 'Morada desativada com sucesso.');
    }

    /**
     * Exibe o formulário para adicionar uma nova morada.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $distritos = Distrito::all();
        $concelhos = [];

        if ($request->filled('distrito')) {
            $concelhos = Concelho::where('distrito', $request->input('distrito'))->get();
        }

        return view('paginas.adicionarMorada', compact('distritos', 'concelhos'));
    }

    /**
     * Armazena uma nova morada.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDistritos()
    {
        $distritos = Distrito::all();
        return view('moradas.create', compact('distritos'));
    }

    /**
     * Armazena uma nova morada.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function obterConcelhosPorDistrito($distritoId)
    {
        $concelhos = Concelho::where('distrito_id', $distritoId)->get();

        return response()->json($concelhos);
    }


}
