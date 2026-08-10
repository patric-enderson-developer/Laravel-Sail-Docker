<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255'],
            'phone'    => ['nullable', 'string', 'max:15'],
            'company'  => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'O nome é obrigatório.',
            'name.max'       => 'O nome não pode exceder 255 caracteres.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email'    => 'Informe um endereço de e-mail válido.',
            'email.max'      => 'O e-mail não pode exceder 255 caracteres.',
            'phone.max'      => 'O telefone não pode exceder 15 caracteres.',
        ];
    }
}
