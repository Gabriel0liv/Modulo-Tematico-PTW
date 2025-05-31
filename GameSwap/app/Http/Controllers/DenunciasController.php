<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Denuncias;
use Illuminate\Support\Facades\Auth;

class DenunciasController extends Controller
{

    public function denunciarUsuario($id){
        $denunciado = User::findOrFail($id);
        $denunciante = Auth::user();

        // Verifica se o usuário já denunciou este usuário
        $denunciaExistente = \App\Models\Denuncias::where('id_denunciante', $denunciante->id)
            ->where('id_denunciado', $denunciado->id)
            ->first();

        if ($denunciaExistente) {
            return redirect()->back()->with('error', 'Você já denunciou este usuário.');
        }

        return view('paginas.ticketDenuncia', compact('denunciado'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'motivo' => 'required|string',
            'tipo' => 'required|string',
            'terms' => 'accepted',
        ]);

        $denunciante = Auth::user();
        $denunciado = User::where('username', $request->username)->firstOrFail();

        // Evita denúncias duplicadas
        $denunciaExistente = Denuncias::where('id_denunciante', $denunciante->id)
            ->where('id_denunciado', $denunciado->id)
            ->first();

        if ($denunciaExistente) {
            return back()->with('error', 'Você já denunciou este usuário.');
        }

        Denuncias::create([
            'id_denunciante' => $denunciante->id,
            'id_denunciado' => $denunciado->id,
            'tipo' => $request->tipo,
            'motivo' => $request->motivo,
            'status' => 0, // Status 0 para pendente
        ]);

        return back()->with('success', 'Sua denúncia foi enviada com sucesso.');
    }

    public function resolverDenuncias(Request $request)
    {
        $denuncias = Denuncias::all();

        return view('paginas.perfilAdmin.denuncias', ['denuncias' => $denuncias]);
    }

}
