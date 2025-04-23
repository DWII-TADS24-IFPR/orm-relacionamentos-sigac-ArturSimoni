<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use SoftDeletes;
    protected $table = 'turmas';
    protected $fillable = [
        'curso_id',
        'ano',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
    public function aluno()
    {
        return $this->hasMany(Aluno::class);
    }
}
