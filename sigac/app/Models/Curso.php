<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use SoftDeletes;

    protected $table = 'cursos';
    protected $fillable = [
        'nome',
        'sigla',
        'total_horas',
        'nivel_id',
        'eixo_id',
    ];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }
    public function aluno()
    {
        return $this->hasMany(Aluno::class);
    }
    public function categoria()
    {
        return $this->hasMany(Categoria::class);
    }
    public function turma()
    {
        return $this->hasMany(Turma::class);
    }
}