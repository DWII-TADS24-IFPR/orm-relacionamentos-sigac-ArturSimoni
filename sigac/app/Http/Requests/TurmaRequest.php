<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurmaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'curso_id' => 'required|exists:cursos,id',
            'ano' => 'required|integer|min:1900|max:' . date('Y'),
        ];
    }

    public function messages()
    {
        return [
            'curso_id.required' => 'O campo curso é obrigatório.',
            'curso_id.exists' => 'O curso selecionado não é válido.',
            'ano.required' => 'O campo ano é obrigatório.',
            'ano.integer' => 'O ano deve ser um número inteiro.',
            'ano.min' => 'O ano deve ser maior ou igual a 1900.',
            'ano.max' => 'O ano não pode ser maior que ' . date('Y') . '.',
        ];
    }
}
