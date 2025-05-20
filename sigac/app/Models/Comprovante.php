<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Comprovante extends Model
{
    use SoftDeletes;
    protected $table = 'comprovantes';

    protected $fillable = [
        'horas',
        'atividade',
        'categoria_id',
        'aluno_id',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function declaracao()
    {
        return $this->hasMany(Declaracao::class);
    }
}
