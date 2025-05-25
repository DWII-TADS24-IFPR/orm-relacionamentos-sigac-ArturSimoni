<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Categoria;
use App\Http\Requests\DocumentoRequest;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentos = Documento::all();
        return view('documento.index', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
    return view('documentos.upload');
    }


    public function store(Request $request)
    {
    $request->validate([
    'documento' => 'required|file|mimes:pdf|max:2048',
    ]);
    $caminho = $request->file('documento')->store('documentos',
    'public');
    }



    /**
     * Display the specified resource.
     */
    public function show(Documento $documento)
    {
        return view('documento.show', compact('documento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documento $documento)
    {
        $categorias = Categoria::all();
        return view('documento.edit', compact('documento', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentoRequest $request, Documento $documento)
    {
        $documento->update($request->validated());
        return redirect()->route('documentos.index')->with('success', 'Documento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documento $documento)
    {
        $documento->delete();
        return redirect()->route('documentos.index')->with('success', 'Documento excluído com sucesso!');
    }
}
