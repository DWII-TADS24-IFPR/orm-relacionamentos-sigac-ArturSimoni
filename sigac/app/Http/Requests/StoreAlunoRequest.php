<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlunoRequest extends FormRequest
{
    public function authorize()
    {
        return true; // ajustar se precisar de autorização específica
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'curso' => 'nullable|string|max:255',
            'matricula' => 'required|string|unique:alunos,matricula,' . $this->aluno,
            'email' => 'required|email|unique:alunos,email,' . $this->aluno,
        ];
    }
}
