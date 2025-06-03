<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\jogo;
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
        $denunciaExistente = Denuncias::where('id_denunciante', $denunciante->id)
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

        return redirect()->route('pagina_inicial')
            ->with('success', 'Sua denúncia foi enviada com sucesso.');

    }

    public function resolverDenuncias(Request $request)
    {
        $denuncias = Denuncias::all();

        return view('paginas.perfilAdmin.denuncias', ['denuncias' => $denuncias]);
    }

    public function exibirDenuncia($id)
    {
        $denuncia = Denuncias::findOrFail($id);
        $user = User::where('id', $denuncia->id_denunciado)->firstOrFail();
        $jogos = Jogo::where('id_anunciante', $user->id)->get();
        $consoles = Console::where('id_anunciante', $user->id)->get();
        $produtos = $jogos->merge($consoles);

        return view('paginas.perfilAdmin.detalhesDenuncia', compact('denuncia', 'user', 'produtos'));
    }

    public function resolver(Request $request, $id)
    {
        $denuncia = Denuncias::findOrFail($id);
        $denuncia->status = '1';
        $denuncia->resolvido_em = now();
        $denuncia->save();

        $user = $denuncia->denunciado;
        if ($user) {
            $user->estado = 'ativo';
            $user->save();
        }

        return redirect('/perfilAdmin/denuncias')->with('success', 'Denúncia resolvida com sucesso.');
    }

    public function suspender(Request $request, $id)
    {
        $duracao = $request->input('duracao');

        $denuncia = Denuncias::findOrFail($id);
        $user = $denuncia->denunciado;
        $denuncia->status = 1;
        $denuncia->resolvido_em = now();
        $denuncia->data_reativacao = now()->addDays($request->dias);
        $denuncia->save();

        if ($user) {
            $user->estado = 'suspenso';
            $user->save();
        }

        return redirect('/perfilAdmin/denuncias')->with('success', 'Usuário suspenso com sucesso.');
    }

    public function banir(Request $request, $id)
    {
        $denuncia = Denuncias::findOrFail($id);
        $denuncia->status = '1';
        $denuncia->resolvido_em = now();
        $denuncia->data_reativacao = '9999-12-31 23:59:59';
        $denuncia->save();

        $user = $denuncia->denunciado;
        if ($user) {
            $user->estado = 'banido';
            $user->save();
        }

        return redirect('/perfilAdmin/denuncias')->with('success', 'Denúncia resolvida com sucesso.');
    }

}
