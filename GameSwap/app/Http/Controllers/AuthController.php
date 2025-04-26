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

    public function login (LoginUserRequest $request){

        if(Auth::attempt($request->only('username', 'password'))){
            $request->session()->regenerate();
            return redirect()->route('pagina_inicial');

            $user = Auth::user();
            if($user->tipo === 'admin'){
                return redirect()->route('perfilAdmin');
            }
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
