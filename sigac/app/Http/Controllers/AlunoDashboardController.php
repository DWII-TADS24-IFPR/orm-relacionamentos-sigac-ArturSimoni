<?php

namespace App\Http\Controllers;

use App\Models\HorasCumpridas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $aluno = $user->aluno;
        $horasCumpridas = $aluno ? $aluno->horasCumpridas()->with('documento')->get() : [];
        return view('aluno.dashboard', compact('user', 'horasCumpridas'));
    }
}
