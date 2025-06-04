<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    public function index()
    {
        $eixos = Eixo::all();
        return view('eixo.index', compact('eixos'));
    }

    public function create()
    {
        return view('eixo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);
        Eixo::create($request->only('nome'));
        return redirect()->route('coordenador.eixos.index')->with('success', 'Eixo criado com sucesso!');
    }

    public function edit(Eixo $eixo)
    {
        return view('eixo.edit', compact('eixo'));
    }

    public function update(Request $request, Eixo $eixo)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);
        $eixo->update($request->only('nome'));
        return redirect()->route('coordenador.eixos.index')->with('success', 'Eixo atualizado com sucesso!');
    }

    public function destroy(Eixo $eixo)
    {
        $eixo->delete();
        return redirect()->route('coordenador.eixos.index')->with('success', 'Eixo removido com sucesso!');
    }

    public function show(Eixo $eixo)
    {
        return view('eixo.show', compact('eixo'));
    }
}
