<?php

namespace App\Http\Controllers;

use App\Models\Morada;
use App\Models\User;
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

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('perfilAdmin');


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

    public function adicionarMorada(Request $request)
    {
        $validatedData = $request->validate([
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

        Morada::create([
            'user_id' => auth()->id(),
            'morada' => $validatedData['morada'],
            'codigo_postal' => $validatedData['codigo_postal'],
            'distrito_id' => $validatedData['distrito_id'],
            'concelho_id' => $validatedData['concelho_id'],
            'nome_morada' => $validatedData['nome_morada'],
        ]);

        return redirect()->route('perfil.moradas');
    }

    public function mostrarMoradas()
    {
        $moradas = Morada::with(['distrito', 'concelho'])
            ->where('user_id', auth()->id())
            ->get();
        return view('paginas.perfil.perfilmoradas', compact('moradas'));
    }

    public function verificarUsername(Request $request)
    {
        $existe = \App\Models\User::where('username', $request->username)->exists();

        return response()->json(['existe' => $existe]);
    }

    public function mostrarVendas()
    {
        $userId = auth()->id();

        // Buscar jogos e consoles vendidos pelo utilizador (id_comprador não nulo)
        $jogosVendidos = \App\Models\Jogo::where('id_anunciante', $userId)
            //->whereNotNull('id_comprador')
            //->with('comprador') // relacione com o comprador, se existir
            ->get();

        $consolesVendidos = \App\Models\Console::where('id_anunciante', $userId)
            //->whereNotNull('id_comprador')
            //->with('comprador')
            ->get();

        $vendas = $jogosVendidos->merge($consolesVendidos);

        return view('paginas.perfil.perfilminhasvendas', compact('vendas'));
    }
}
