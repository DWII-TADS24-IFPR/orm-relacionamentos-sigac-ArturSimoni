<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use SoftDeletes;
    protected $table = 'documentos';
    protected $fillable = [
        'url',
        'descricao',
        'horas_in',
        'status',
        'comentario',
        'horas_out',
        'categoria_id',
        'user_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}