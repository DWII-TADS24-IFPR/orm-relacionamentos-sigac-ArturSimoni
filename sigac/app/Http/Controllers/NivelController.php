<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use App\Http\Requests\NivelRequest;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveis = Nivel::all();
        return view('niveis.index', compact('niveis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('niveis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NivelRequest $request)
    {
        Nivel::create($request->validated());
        return redirect()->route('niveis.index')->with('success', 'Nível criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nivel $nivel)
    {
        return view('niveis.show', compact('nivel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nivel $nivel)
    {
        return view('niveis.edit', compact('nivel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NivelRequest $request, Nivel $nivel)
    {
        $nivel->update($request->validated());
        return redirect()->route('niveis.index')->with('success', 'Nível atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nivel $nivel)
    {
        $nivel->delete();
        return redirect()->route('niveis.index')->with('success', 'Nível excluído com sucesso!');
    }
}
