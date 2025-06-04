<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\RegisterViewResponse as RegisterViewResponseContract;
use App\Models\Curso;
use App\Models\Turma;

class RegisterViewResponse implements RegisterViewResponseContract
{
    public function toResponse($request)
    {
        $cursos = Curso::all();
        $turmas = Turma::with('curso')->get();

        return view('auth.register', [
            'cursos' => $cursos,
            'turmas' => $turmas,
        ]);
    }
}
