<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController
{
    public function atualizarInformacoes(Request $request){
        $user = Auth::user();
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->dataNascimento = $request->input('dataNascimento');
        $user->contato = $request->input('contato');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        return redirect()->route('perfilPage');

    }

    public function deletarConta(Request $request)
    {

        $user = Auth::user();

        if (!$user) {
            return redirect('/')->withErrors(['error' => 'Usuário não autenticado.']);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return back()->withErrors(['password' => 'Senha incorreta.']);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->delete();

        return redirect()->route('pagina_inicial');
    }
}
