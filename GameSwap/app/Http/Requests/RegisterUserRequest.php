<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Permite que qualquer pessoa use esta request
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|regex:/^\+?[0-9\s]+$/|max:15',
            'birthdate' => 'required|date|before_or_equal:' . Carbon::now()->subYears(13)->toDateString(),
            'username' => 'required|string|max:255|unique:users,username',
            'password_confirmation' => 'required_with:password|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            // Mensagens de erro personalizadas para cada regra de validação
            'name.required' => 'Preencha todos os campos obrigatórios.',
            'email.required' => 'Preencha todos os campos obrigatórios.',
            'email.email' => 'O email inserido não é válido.',
            'email.unique' => 'Este email já está registado.',
            'password.required' => 'Preencha todos os campos obrigatórios.',
            'password.min' => 'A palavra-passe deve ter pelo menos :min caracteres.',
            'password.confirmed' => 'A confirmação da palavra-passe não coincide.',
            'phone.required' => 'Preencha todos os campos obrigatórios.',
            'phone.string' => 'Numero de telefone invalido.',
            'phone.max' => 'O telefone não pode ter mais de :max caracteres.',
            'phone.regex' => 'O telefone deve conter apenas números e espaços.',
            'birthdate.required' => 'Preencha todos os campos obrigatórios.',
            'birthdate.date' => 'A data de nascimento deve ser uma data válida.',
            'birthdate.before_or_equal' => 'O Utilizador deve ter mais de 13 anos.',
            'username.required' => 'Preencha todos os campos obrigatórios.',
            'username.string' => 'Nome de utilizador invalido.',
            'username.max' => 'O nome de utilizador não pode ter mais de :max caracteres.',
            'username.unique' => 'Este nome de utilizador já está registado.',
            'password_confirmation.required_with' => 'Preencha todos os campos obrigatórios.',
            'password_confirmation.same' => 'A confirmação da palavra-passe não coincide com a palavra-passe.',

        ];
    }
}
