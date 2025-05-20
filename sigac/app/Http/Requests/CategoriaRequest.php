<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'maximo_horas' => 'required|integer|min:1',
            'curso_id' => 'required|exists:cursos,id',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome da categoria é obrigatório.',
            'nome.string' => 'O nome da categoria deve ser uma string.',
            'nome.max' => 'O nome da categoria não pode ter mais de 255 caracteres.',
            'maximo_horas.required' => 'O máximo de horas é obrigatório.',
            'maximo_horas.integer' => 'O máximo de horas deve ser um número inteiro.',
            'maximo_horas.min' => 'O máximo de horas deve ser pelo menos 1.',
            'curso_id.required' => 'O curso é obrigatório.',
            'curso_id.exists' => 'O curso selecionado não existe.',
        ];
    }
}
