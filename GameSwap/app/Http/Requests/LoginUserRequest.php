<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string',
            'password' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Preencha todos os campos obrigatórios.',
            'username.string' => 'Nome de utilizador inválido.',
            'password.required' => 'Preencha todos os campos obrigatórios.',
            'password.string' => 'Palavra-passe inválida.'
        ];
    }
}
