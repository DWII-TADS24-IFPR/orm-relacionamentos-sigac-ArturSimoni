<?php

namespace App\Http\Controllers;

use App\Models\Declaracao;
use App\Models\Aluno;
use App\Models\Comprovante;
use App\Http\Requests\DeclaracaoRequest;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class DeclaracaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Se quiser listar só declarações do aluno logado, filtra aqui
        $aluno = Aluno::where('user_id', Auth::id())->first();

        if ($aluno) {
            $declaracoes = Declaracao::with(['aluno', 'comprovante'])
                ->where('aluno_id', $aluno->id)
                ->paginate(10);
        } else {
            $declaracoes = Declaracao::with(['aluno', 'comprovante'])->paginate(10);
        }

        return view('declaracao.index', compact('declaracoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aluno = Aluno::where('user_id', Auth::id())->first();

        // Se a declaração precisa obrigatoriamente estar ligada ao aluno logado,
        // passamos só esse aluno.
        $alunos = $aluno ? collect([$aluno]) : Aluno::all();

        $comprovantes = Comprovante::all();

        return view('declaracao.create', compact('alunos', 'comprovantes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeclaracaoRequest $request)
    {
        $aluno = Aluno::where('user_id', Auth::id())->first();

        $data = $request->validated();

        // Garantir que a declaração fique ligada ao aluno logado (caso queira essa regra)
        $data['aluno_id'] = $aluno->id;

        Declaracao::create($data);

        return redirect()->route('declaracoes.index')->with('success', 'Declaração criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Declaracao $declaracao)
    {
        // Pode incluir autorização aqui para garantir que o usuário vê só as declarações dele
        return view('declaracao.show', compact('declaracao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Declaracao $declaracao)
    {
        $aluno = Aluno::where('user_id', Auth::id())->first();
        $alunos = $aluno ? collect([$aluno]) : Aluno::all();
        $comprovantes = Comprovante::all();

        return view('declaracao.edit', compact('declaracao', 'alunos', 'comprovantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeclaracaoRequest $request, Declaracao $declaracao)
    {
        $data = $request->validated();

        $aluno = Aluno::where('user_id', Auth::id())->first();

        // Garantir que a declaração fica associada ao aluno logado
        $data['aluno_id'] = $aluno->id;

        $declaracao->update($data);

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

    /**
     * Gerar e baixar PDF da declaração.
     */
    public function downloadPdf(Declaracao $declaracao)
    {
        // Exemplo simples, configure a view de PDF conforme sua necessidade
        $pdf = PDF::loadView('declaracao.pdf', compact('declaracao'));

        return $pdf->download('declaracao_'.$declaracao->id.'.pdf');
    }
}
