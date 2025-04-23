<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use SoftDeletes;

    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'senha',
        'user_id',
        'curso_id',
        'turma_id',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
    public function comprovante(){
        return $this->hasMany(Comprovante::class);
    }
    public function declaracao(){
        return $this->hasMany(Declaracao::class);
    }
}