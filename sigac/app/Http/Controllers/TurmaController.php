<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use App\Models\Aluno;
use App\Models\HorasCumpridas;
use App\Http\Requests\TurmaRequest;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turmas = Turma::with('curso')->get();
        return view('turma.index', compact('turmas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();

        return view('turma.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TurmaRequest $request)
    {
        Turma::create($request->validated());
        return redirect()->route('coordenador.turmas.index')->with('success', 'Turma criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Turma $turma)
    {
        return view('turma.show', compact('turma'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turma $turma)
    {
        $cursos = Curso::all();
        return view('turma.edit', compact('turma', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TurmaRequest $request, Turma $turma)
    {
        $turma->update($request->validated());
        return redirect()->route('coordenador.turmas.index')->with('success', 'Turma atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turma $turma)
    {
        $turma->delete();
        return redirect()->route('coordenador.turmas.index')->with('success', 'Turma excluída com sucesso!');
    }

    /**
     * Display a graph of hours completed by students in a class.
     */
    public function graficoHoras($turmaId)
    {
        $alunos = Aluno::where('turma_id', $turmaId)->with(['horasCumpridas' => function($q) {
            $q->where('status', 'Aprovado');
        }])->get();
        $labels = $alunos->pluck('nome');
        $horas = $alunos->map(function($aluno) {
            return $aluno->horasCumpridas->sum('horas');
        });
        $turma = \App\Models\Turma::find($turmaId);
        return view('turma.grafico_horas', compact('alunos', 'labels', 'horas', 'turma'));
    }
}
