<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
    $cursoId = $this->route('curso') ? $this->route('curso')->id : null;

    return [
        'nome' => 'required|string|max:255',
        'sigla' => 'required|string|max:10|unique:cursos,sigla,' . $cursoId,
        'total_horas' => 'required|integer|min:1',
        'nivel_id' => 'required|exists:niveis,id',
        'eixo_id' => 'nullable|integer',
    ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do curso é obrigatório.',
            'sigla.required' => 'A sigla do curso é obrigatória.',
            'sigla.unique' => 'A sigla já está em uso.',
            'total_horas.required' => 'O total de horas é obrigatório.',
            'nivel_id.required' => 'O nível do curso é obrigatório.',
            'nivel_id.exists' => 'O nível selecionado não é válido.',
        ];
    }
}
