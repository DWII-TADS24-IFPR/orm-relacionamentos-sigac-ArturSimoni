<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'url' => 'nullable|string|max:255',
            'descricao' => 'required|string|max:255',
            'horas_in' => 'required|numeric|min:0',
            'status' => 'required|string|max:50',
            'comentario' => 'nullable|string|max:255',
            'horas_out' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'user_id' => 'nullable|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'url.required' => 'O campo URL é obrigatório.',
            'url.url' => 'O campo URL deve ser uma URL válida.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'horas_in.required' => 'O campo horas de entrada é obrigatório.',
            'horas_in.numeric' => 'O campo horas de entrada deve ser um número.',
            'horas_in.min' => 'O campo horas de entrada deve ser pelo menos 0.',
            'status.required' => 'O campo status é obrigatório.',
            'comentario.max' => 'O campo comentário não pode ter mais de 255 caracteres.',
            'horas_out.required' => 'O campo horas de saída é obrigatório.',
            'horas_out.numeric' => 'O campo horas de saída deve ser um número.',
            'horas_out.min' => 'O campo horas de saída deve ser pelo menos 0.',
            'categoria_id.required' => 'O campo categoria é obrigatório.',
            'categoria_id.exists' => 'A categoria selecionada não é válida.',
            'user_id.exists' => 'O usuário selecionado não é válido.',
        ];
    }
}
