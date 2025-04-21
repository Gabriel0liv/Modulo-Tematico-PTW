<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function criarRegisto (Request $request)
    {
        $validar = $request->validate([
            'register_name' => 'required|string|max:255',
            'register_email' => 'required|email|unique:users,email',
            'register_phone' => 'required|string|max:255',
            'register_dob' =>   'required|date',
            'register_username' => 'required|string|max:255',
            'register_password' => 'required|string|min:8|confirmed'
        ]);

        $user = new User();
        $user->name = $request->input('register_name');
        $user->email = $request->input('register_email');
        $user->contato = $request->input('register_phone');
        $user->dataNascimento = $request->input('register_dob');
        $user->username = $request->input('register_username');
        $user->password = $request->input('register_password');
        $user->save();
        
        Auth::login($user);

        return redirect()->route('pagina_inicial');
    }

    public function login (Request $request){
        $validar = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        
        if(Auth::attempt($validar)){
            $request->session()->regenerate();
            return redirect()->route('pagina_inicial');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Credenciais incorretas'
        ]);
        
    }
    
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pagina_inicial');
    }
}
