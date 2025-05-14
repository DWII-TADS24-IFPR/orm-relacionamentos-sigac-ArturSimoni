<?php

namespace App\Http\Controllers;

use App\Models\Declaracao;
use App\Models\Aluno;
use App\Models\Comprovante;
use App\Http\Requests\DeclaracaoRequest;
use Illuminate\Http\Request;

class DeclaracaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $declaracoes = Declaracao::with(['aluno', 'comprovante'])->paginate(10);
        return view('declaracao.index', compact('declaracoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alunos = Aluno::all();
        $comprovantes = Comprovante::all();
        return view('declaracao.create', compact('alunos', 'comprovantes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeclaracaoRequest $request)
    {
        Declaracao::create($request->validated());
        return redirect()->route('declaracoes.index')->with('success', 'Declaração criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Declaracao $declaracao)
    {
        return view('declaracao.show', compact('declaracao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Declaracao $declaracao)
    {

        $alunos = Aluno::all();
        $comprovantes = Comprovante::all();
        return view('declaracao.edit', compact('declaracao', 'alunos', 'comprovantes'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeclaracaoRequest $request, Declaracao $declaracao)
    {
        $declaracao->update($request->validated());
        return redirect()->route('declaracoes.index')->with('success', 'Declaração atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Declaracao $declaracao)
    {
        $declaracao->delete();
        return redirect()->route('declaracoes.index')->with('success', 'Declaração excluída com sucesso!');
    }
}
