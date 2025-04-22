<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function criarRegisto (RegisterUserRequest $request)
    {

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contato = $request->input('phone');
        $user->dataNascimento = $request->input('birthdate');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password')); // Certifique-se de criptografar a senha
        $user->passsword_confirmation = bcrypt($request->input('password_confirmation')); // Certifique-se de criptografar a senha
        $user->save();

        Auth::login($user);

        return redirect()->route('pagina_inicial');
    }

    public function login (LoginUserRequest $request){

        // Obter as credenciais do request
        $credentials = $request->only('username', 'password');

        // Tentar autenticar o utilizador
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('pagina_inicial');
        }

        // Lançar exceção se as credenciais forem inválidas
        throw ValidationException::withMessages([
            'username' => 'O nome de utilizador ou a palavra-passe estão incorretos.',
        ]);

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pagina_inicial');
    }
}
