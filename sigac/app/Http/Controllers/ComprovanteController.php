<?php

namespace App\Http\Controllers;

use App\Models\Comprovante;
use App\Models\Aluno;
use App\Models\Categoria;
use App\Http\Requests\ComprovanteRequest;
use Illuminate\Http\Request;

class ComprovanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comprovantes = Comprovante::with(['aluno', 'categoria'])->paginate(10);
        return view('comprovante.index', compact('comprovantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $alunos = Aluno::all();
        return view('comprovante.create', compact('categorias', 'alunos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComprovanteRequest $request)
    {
        Comprovante::create($request->validated());
        return redirect()->route('coordenador.comprovantes.index')->with('success', 'Comprovante criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comprovante $comprovante)
    {
        return view('comprovante.show', compact('comprovante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comprovante $comprovante)
    {
        $categorias = Categoria::all();
        $alunos = Aluno::all();
        return view('comprovante.edit', compact('comprovante', 'categorias', 'alunos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComprovanteRequest $request, Comprovante $comprovante)
    {
        $comprovante->update($request->validated());
        return redirect()->route('coordenador.comprovantes.index')->with('success', 'Comprovante atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comprovante $comprovante)
    {
        $comprovante->delete();
        return redirect()->route('coordenador.comprovantes.index')->with('success', 'Comprovante deletado com successo.');
    }
}
