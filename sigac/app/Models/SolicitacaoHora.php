<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoHora extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'descricao',
        'carga_horaria',
        'arquivo',
        'status',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
