<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComprovanteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'horas' => 'required|integer|min:1',
            'atividade' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'aluno_id' => 'required|exists:alunos,id',
            'user_id' => 'nullable|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'horas.required' => 'O campo horas é obrigatório.',
            'horas.integer' => 'O campo horas deve ser um número inteiro.',
            'horas.min' => 'O campo horas deve ser pelo menos 1.',
            'atividade.required' => 'O campo atividade é obrigatório.',
            'atividade.string' => 'O campo atividade deve ser uma string.',
            'atividade.max' => 'O campo atividade não pode ter mais de 255 caracteres.',
            'categoria_id.required' => 'O campo categoria é obrigatório.',
            'categoria_id.exists' => 'A categoria selecionada não é válida.',
            'aluno_id.required' => 'O campo aluno é obrigatório.',
            'aluno_id.exists' => 'O aluno selecionado não é válido.',
            'user_id.exists' => 'O usuário selecionado não é válido.',
        ];
    }
}
