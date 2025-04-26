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
            'register_name' => 'required|string|max:255',
            'register_email' => 'required|email|unique:users,email',
            'register_phone' => 'required|string|max:255',
            'register_dob' =>   'required|date',
            'register_username' => 'required|string|max:255',
            'register_password' => 'required|string|min:8|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            // Mensagens de erro personalizadas para cada regra de validação
            'register_name.required' => 'Preencha todos os campos obrigatórios.',
            'register_name.string' => 'Nome de utilizador invalido.',
            'register_name.max' => 'O nome de utilizador não pode ter mais de :max caracteres.',
            'register_email.required' => 'Preencha todos os campos obrigatórios.',
            'register_email.email' => 'O email inserido não é válido.',
            'register_email.unique' => 'Este email já está registado.',
            'register_password.required' => 'Preencha todos os campos obrigatórios.',
            'register_password.min' => 'A palavra-passe deve ter pelo menos :min caracteres.',
            'register_password.confirmed' => 'A confirmação da palavra-passe não coincide.',
            'register_phone.required' => 'Preencha todos os campos obrigatórios.',
            'register_phone.string' => 'Numero de telefone invalido.',
            'register_phone.max' => 'O telefone não pode ter mais de :max caracteres.',
            'register_dob.required' => 'Preencha todos os campos obrigatórios.',
            'register_dob.date' => 'A data de nascimento deve ser uma data válida.',
            'register_username.required' => 'Preencha todos os campos obrigatórios.',
            'register_username.string' => 'Nome de utilizador invalido.',
            'register_username.max' => 'O nome de utilizador não pode ter mais de :max caracteres.',
        ];
    }
}
