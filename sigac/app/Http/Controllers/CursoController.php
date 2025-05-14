<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Nivel;
use App\Models\Categoria;
use App\Http\Requests\CursoRequest;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $niveis = Nivel::all();
        $categorias = Categoria::all();
        return view('curso.create', compact('niveis', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursoRequest $request)
    {
        Curso::create($request->validated());
        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        return view('curso.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        $niveis = Nivel::all();
        $categorias = Categoria::all();
        return view('curso.edit', compact('curso', 'niveis', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursoRequest $request, Curso $curso)
    {
        $curso->update($request->validated());
        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso deletado com sucesso!');
    }
}
