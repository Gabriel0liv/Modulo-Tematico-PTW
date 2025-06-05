<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Notifications\EmailConfirmacaoRegisto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function criarRegisto (Request $request)
    {
        $request->validate([
            'register_name' => 'required|string|max:255',
            'register_email' => 'required|email|unique:users,email',
            'register_phone' => 'string|max:20',
            'register_dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
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
        $user->estado = 'ativo';
        $user->save();
        $user->notify(new EmailConfirmacaoRegisto());

        Auth::login($user);

        return redirect()->route('pagina_inicial')->with('success', 'Cadastro realizado com sucesso!');
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
            if ($user->estado !== 'ativo') {
                Auth::logout();
                $mensagem = $user->estado === 'banido'
                    ? 'Sua conta está banida.'
                    : 'Sua conta está suspensa.';
                return back()->with('error', $mensagem)->withInput();
            }
            if ($user->tipo === 'admin') {
                return redirect()->route('perfilAdmin');
            }

            return redirect()->route('pagina_inicial')->with('success', 'Login realizado com sucesso!');
        }

        // Se falhar a autenticação
        return back();

    }

    public function showForgotPasswordForm()
    {
        return view('paginas.auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'E-mail não encontrado. Verifique e tente novamente.');
        }

        // Remove token antigo
        DB::table('password_resets')->where('email', $user->email)->delete();

        // Cria novo token
        $token = Password::getRepository()->create($user);

        // Envia e-mail com link manual
        $resetLink = url(route('password.reset', [
            'token' => $token,
            'email' => $user->email
        ], false));

        Mail::raw("Clique no link para redefinir sua senha: $resetLink", function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Redefinição de Senha - GameSwap');
        });

        return back()->with('success', 'Um link para redefinição de senha foi enviado para seu e-mail.');
    }

    public function showResetForm(Request $request, $token)
    {
        return view('paginas.auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email') // <- ESSENCIAL
        ]);
    }

    public function resetPassword(Request $request)
    {
        Log::info('Iniciando resetPassword()', $request->all());

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                Log::info('Token válido, redefinindo senha para: ' . $user->email);

                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        Log::info('Resultado do reset: ' . $status);

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Senha redefinida com sucesso. Você já pode fazer login.')
            : back()->with('error', 'Erro ao redefinir a senha. Verifique os dados e tente novamente.');
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pagina_inicial')->with('success', 'Logout realizado com sucesso!');
    }
}
