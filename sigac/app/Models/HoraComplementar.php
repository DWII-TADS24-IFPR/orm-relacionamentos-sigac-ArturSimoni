<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoraComplementar extends Model
{
    use HasFactory;

    protected $fillable = ['aluno_id', 'descricao', 'quantidade_horas', 'data_atividade', 'status'];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
