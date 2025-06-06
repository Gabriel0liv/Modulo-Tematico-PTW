<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Console;
use App\Models\jogo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Denuncias;
use Illuminate\Support\Facades\Auth;

class DenunciasController extends Controller
{

    /**
     * Exibe o formulário de denúncia para um utilizador específico.
     *
     * @param int $id ID do usuário a ser denunciado
     * @return \Illuminate\View\View
     */
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

    /**
     * Armazena uma nova denúncia.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
            ->with('success', "Denúncia contra @{$denunciado->username} enviada com sucesso. Nossa equipe irá analisá-la em breve.");

    }

    /**
     * Exibe a lista de denúncias pendentes para o administrador.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function resolverDenuncias(Request $request)
    {
        $denuncias = Denuncias::paginate(10);

        return view('paginas.perfilAdmin.denuncias', ['denuncias' => $denuncias]);
    }

    /**
     * Exibe os detalhes de uma denúncia específica.
     *
     * @param int $id ID da denúncia
     * @return \Illuminate\View\View
     */
    public function exibirDenuncia($id)
    {
        $denuncia = Denuncias::findOrFail($id);
        $banimentos = Denuncias::where('id_denunciado', $denuncia->id_denunciado)
            ->get()
            ->filter(function ($denuncia) {
                return $denuncia->status == 1 && $denuncia->data_reativacao != null;
            });
        $user = User::where('id', $denuncia->id_denunciado)->firstOrFail();
        $jogos = Jogo::where('id_anunciante', $user->id)->get();
        $consoles = Console::where('id_anunciante', $user->id)->get();
        $produtos = $jogos->merge($consoles);
        $comentarios = Comentario::where('id_remetente', $user->id)->paginate(10);
        return view('paginas.perfilAdmin.detalhesDenuncia', compact('denuncia', 'banimentos','user', 'produtos', 'comentarios'));
    }

    /**
     * Resolve uma denúncia, marcando-a como resolvida.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id ID da denúncia a ser resolvida
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Suspende um utilizador por um período específico.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id ID da denúncia a ser suspensa
     * @return \Illuminate\Http\RedirectResponse
     */
    public function suspender(Request $request, $id)
    {
        $duracao = $request->input('duracao');

        $denuncia = Denuncias::findOrFail($id);
        $user = $denuncia->denunciado;
        $denuncia->status = 1;
        $denuncia->resolvido_em = now();
        $denuncia->data_reativacao = now()->addDays($duracao);
        $denuncia->save();

        if ($user) {
            $user->estado = 'suspenso';
            $user->save();
        }

        return redirect('/perfilAdmin/denuncias')->with('success', 'Usuário suspenso com sucesso.');
    }


/**
     * Banir um utilizador permanentemente.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id ID da denúncia a ser banida
     * @return \Illuminate\Http\RedirectResponse
     */
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
