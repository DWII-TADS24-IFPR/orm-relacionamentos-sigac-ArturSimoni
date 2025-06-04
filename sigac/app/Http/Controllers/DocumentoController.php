<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\HorasCumpridas;
use App\Models\Categoria;
use App\Http\Requests\DocumentoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $categorias = Categoria::all();

        return view('documento.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentoRequest $request)
    {
        Documento::create($request->validated());
        return redirect()->route('coordenador.documentos.index')->with('success', 'Documento criado com sucesso!');
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
        return redirect()->route('coordenador.documentos.index')->with('success', 'Documento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documento $documento)
    {
        $documento->delete();
        return redirect()->route('coordenador.documentos.index')->with('success', 'Documento excluído com sucesso!');
    }

    public function createAluno()
    {
        $categorias = Categoria::all();
        return view('aluno.documento_create', compact('categorias'));
    }

    public function storeAluno(Request $request)
    {
        $request->validate([
            'arquivo' => 'required|file|mimes:pdf|max:5120',
            'descricao' => 'required|string|max:255',
            'horas' => 'required|numeric|min:0.1',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        $user = Auth::user();
        $aluno = \App\Models\Aluno::where('user_id', $user->id)->first();
        if (!$aluno) {
            return redirect()->route('aluno.dashboard')->with('error', 'Aluno não encontrado para este usuário.');
        }
        $path = $request->file('arquivo')->store('documentos', 'public');
        $documento = \App\Models\Documento::create([
            'url' => $path,
            'descricao' => $request->descricao,
            'horas_in' => $request->horas,
            'status' => 'Pendente',
            'comentario' => '',
            'horas_out' => 0,
            'categoria_id' => $request->categoria_id,
            'user_id' => $user->id,
        ]);
        HorasCumpridas::create([
            'aluno_id' => $aluno->id,
            'documento_id' => $documento->id,
            'horas' => $request->horas,
            'status' => 'Pendente',
            'comentario' => '',
        ]);
        return redirect()->route('aluno.dashboard')->with('success', 'Documento submetido para aprovação!');
    }

    public function aprovar($id, Request $request)
    {
        $documento = \App\Models\Documento::findOrFail($id);
        $horas = $request->input('horas_out', $documento->horas_in);
        $comentario = $request->input('comentario', '');
        $documento->status = 'Aprovado';
        $documento->horas_out = $horas;
        $documento->comentario = $comentario;
        $documento->save();

        $horasCumpridas = HorasCumpridas::where('documento_id', $documento->id)->first();
        if ($horasCumpridas) {
            $horasCumpridas->status = 'Aprovado';
            $horasCumpridas->horas = $horas;
            $horasCumpridas->comentario = $comentario;
            $horasCumpridas->save();
        }
        return redirect()->route('coordenador.documentos.index')->with('success', 'Documento aprovado e horas registradas!');
    }

    public function reprovar($id, Request $request)
    {
        $documento = \App\Models\Documento::findOrFail($id);
        $comentario = $request->input('comentario', '');
        $documento->status = 'Reprovado';
        $documento->comentario = $comentario;
        $documento->horas_out = 0;
        $documento->save();

        $horasCumpridas = HorasCumpridas::where('documento_id', $documento->id)->first();
        if ($horasCumpridas) {
            $horasCumpridas->status = 'Reprovado';
            $horasCumpridas->horas = 0;
            $horasCumpridas->comentario = $comentario;
            $horasCumpridas->save();
        }
        return redirect()->route('coordenador.documentos.index')->with('success', 'Documento reprovado!');
    }
}
