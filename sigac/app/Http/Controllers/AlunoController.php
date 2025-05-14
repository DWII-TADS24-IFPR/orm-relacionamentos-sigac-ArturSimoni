<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Nivel;
use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;


class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::with(['curso', 'turma'])->get();
        return view('aluno.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        $turmas = Turma::all();
        $niveis = Nivel::all();
        return view('aluno.create', compact('cursos', 'turmas', 'niveis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Aluno $aluno, AlunoRequest $request)
    {

        $aluno->create(['nome' => $request->nome,
        'cpf' => $request->cpf,
        'email' => $request->email,
        'senha' => bcrypt($request->senha),
        'curso_id' => $request->curso_id,
        'turma_id' => $request->turma_id,]);
        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        return view('aluno.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        $alunos = Aluno::all();
        $cursos = Curso::all();
        $turmas = Turma::all();
        $niveis = Nivel::all();
        return view('aluno.edit', compact('aluno', 'cursos', 'turmas', 'niveis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlunoRequest $request, Aluno $aluno)
    {
        $data = $request->validated();
        if (!empty($data['senha'])) {
            $data['senha'] = bcrypt($data['senha']);
        } else {
            unset($data['senha']);
        }
        $aluno->update($data);
        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso!');
    }


    public function getTurmasByCurso($cursoId)
    {
        try {
            $turmas = \App\Models\Turma::where('curso_id', $cursoId)->get();
            return response()->json($turmas);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar turmas'], 500);
        }
}

}
