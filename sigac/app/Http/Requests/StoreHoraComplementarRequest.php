<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHoraComplementarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'descricao' => 'required|string|max:500',
            'quantidade_horas' => 'required|integer|min:1',
            'data_atividade' => 'required|date',
        ];
    }
}
