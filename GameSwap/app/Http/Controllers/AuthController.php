<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function criarRegisto (Request $request)
    {
        $request->validate([
            'register_name' => 'required|string|max:255',
            'register_email' => 'required|email|unique:users,email',
            'register_phone' => 'string|max:20',
            'register_dob' => 'date',
            'register_username' => 'required|string|unique:users,username|max:255',
            'register_password' => 'required|string|min:8|confirmed',
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

    public function login(Request $request)
    {
        // Validação dos campos
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'O campo username é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.',
        ]);

        // Se a validação falhar, redireciona de volta com os erros
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Tentativa de autenticação
        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->tipo === 'admin') {
                return redirect()->route('perfilAdmin');
            }

            return redirect()->route('pagina_inicial');
        }

        // Se falhar a autenticação
        return back()->withErrors([
            'username' => 'As credenciais fornecidas estão incorretas.',
        ])->withInput();
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pagina_inicial');
    }
}
