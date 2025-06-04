<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aluno;
use App\Models\HorasCumpridas;
use Barryvdh\DomPDF\Facade\Pdf;

class AlunoDeclaracaoController extends Controller
{
    public function gerarDeclaracao()
    {
        $user = Auth::user();
        $aluno = $user->aluno;
        if (!$aluno) {
            return redirect()->route('aluno.dashboard')->with('error', 'Aluno não encontrado.');
        }
        $horasAprovadas = $aluno->horasCumpridas()->where('status', 'Aprovado')->with('documento')->get();
        $totalHoras = $horasAprovadas->sum('horas');
        $pdf = Pdf::loadView('aluno.declaracao_pdf', [
            'aluno' => $aluno,
            'horasAprovadas' => $horasAprovadas,
            'totalHoras' => $totalHoras,
        ]);
        return $pdf->download('declaracao_horas_aprovadas.pdf');
    }
}
