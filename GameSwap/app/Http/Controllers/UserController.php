<?php

namespace App\Http\Controllers;

use App\Models\Morada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function adicionarMorada(Request $request){

        $validatedData = $request->validate([
            'morada' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:255',
            'distrito' => 'required|string|max:255',
            'localidade' => 'required|string|max:255',
            'nome_morada' => 'required|string|max:255',
        ]);

        Morada::create([
            'user_id' => auth()->id(),
            'morada' => $validatedData['morada'],
            'codigo_postal' => $validatedData['codigo_postal'],
            'distrito' => $validatedData['distrito'],
            'localidade' => $validatedData['localidade'],
            'nome_morada' => $validatedData['nome_morada'],
        ]);

        return redirect()->route('perfil-Moradas');
    }

    public function mostrarMoradas()
    {
        $moradas = auth()->user()->moradas; // Usa a relação definida no modelo User
        return view('paginas.perfil.perfilmoradas', compact('moradas'));
    }
}
