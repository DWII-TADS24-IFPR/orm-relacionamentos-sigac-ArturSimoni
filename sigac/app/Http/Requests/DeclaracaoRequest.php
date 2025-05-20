<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeclaracaoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $declaracaoId = $this->route('declaracao') ? $this->route('declaracao')->id : null;
        return [
            'hash' => 'required|string|max:255|unique:declaracoes,hash,' . $declaracaoId,
            'data' => 'required|date',
            'aluno_id' => 'required|exists:alunos,id',
            'comprovante_id' => 'required|exists:comprovantes,id',
        ];
    }

    public function messages()
    {
        return [
            'hash.required' => 'O campo hash é obrigatório.',
            'hash.string' => 'O campo hash deve ser uma string.',
            'hash.max' => 'O campo hash não pode ter mais que 255 caracteres.',
            'hash.unique' => 'Este hash já está em uso.',
            'data.required' => 'O campo data é obrigatório.',
            'data.date' => 'O campo data deve ser uma data válida.',
            'aluno_id.required' => 'O campo aluno é obrigatório.',
            'aluno_id.exists' => 'O aluno selecionado não existe.',
            'comprovante_id.required' => 'O campo comprovante é obrigatório.',
            'comprovante_id.exists' => 'O comprovante selecionado não existe.',
        ];
    }
}
