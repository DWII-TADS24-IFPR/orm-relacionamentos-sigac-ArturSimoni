<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Declaracao;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'aluno') {
            $aluno = $user->aluno;
            if (!$aluno) {
                abort(403, 'Aluno não encontrado.');
            }

            $totalDeclaracoes = $aluno->declaracoes()->count();
            $ultimaDeclaracao = $aluno->declaracoes()->latest()->first();

            return view('dashboard', compact('totalDeclaracoes', 'ultimaDeclaracao'));
        }

        // Para admin, envie para uma view diferente ou apenas um dashboard simples
        return view('dashboard-admin');
    }
}
