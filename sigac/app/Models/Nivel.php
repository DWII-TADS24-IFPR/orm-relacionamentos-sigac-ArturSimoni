<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use SoftDeletes;

    protected $table = 'niveis';
    protected $fillable = [
        'nome',
    ];

    public function curso()
    {
        return $this->hasMany(Curso::class);
    }

}