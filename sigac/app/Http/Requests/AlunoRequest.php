<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permite que qualquer usuário envie a requisição
    }

    public function rules(): array
    {
        $alunoId = $this->route('aluno') ? $this->route('aluno')->id : null;

        return [
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string|max:14|unique:alunos,cpf,' . $alunoId,
        'email' => 'required|email|max:255|unique:alunos,email,' . $alunoId,
        'senha' => $alunoId ? 'nullable|string|min:6|max:255' : 'required|string|min:6|max:255', // Opcional na edição, obrigatório na criação
        'curso_id' => 'required|exists:cursos,id',
        'turma_id' => 'required|exists:turmas,id',
    ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.unique' => 'O CPF digitado já está cadastrado.',
            'cpf.max' => 'O CPF deve ter no máximo 14 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'O e-mail digitado já está cadastrado.',
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres.',
            'curso_id.required' => 'O campo curso é obrigatório.',
            'turma_id.required' => 'O campo turma é obrigatório.',
        ];
    }
}
