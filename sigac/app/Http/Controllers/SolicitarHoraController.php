<?php

namespace App\Http\Controllers;

use App\Models\SolicitacaoHora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitarHoraController extends Controller
{
    /**
     * Lista as solicitações de horas do aluno logado.
     */
    public function index()
    {
        $aluno = Auth::user()->aluno;

        $solicitacoes = SolicitacaoHora::where('aluno_id', $aluno->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('solicitacao_hora.index', compact('solicitacoes'));
    }

    /**
     * Formulário para criar nova solicitação.
     */
    public function create()
    {
        return view('solicitacao_hora.create');
    }

    /**
     * Armazena uma nova solicitação.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:1000',
            'carga_horaria' => 'required|integer|min:1',
            'arquivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $arquivoPath = null;
        if ($request->hasFile('arquivo')) {
            $arquivoPath = $request->file('arquivo')->store('documentos', 'public');
        }

        SolicitacaoHora::create([
            'aluno_id' => Auth::user()->aluno->id,
            'descricao' => $request->descricao,
            'carga_horaria' => $request->carga_horaria,
            'arquivo' => $arquivoPath,
            'status' => 'pendente',
        ]);

        return redirect()->route('solicitacoes.index')->with('success', 'Solicitação enviada com sucesso!');
    }

    /**
     * Exibe os detalhes de uma solicitação.
     */
    public function show(SolicitacaoHora $solicitacaoHora)
    {
        $this->authorize('view', $solicitacaoHora); // proteção para só o dono acessar

        return view('solicitacao_hora.show', compact('solicitacaoHora'));
    }

    /**
     * Formulário para editar uma solicitação (caso permitido).
     */
    public function edit(SolicitacaoHora $solicitacaoHora)
    {
        $this->authorize('update', $solicitacaoHora);

        return view('solicitacao_hora.edit', compact('solicitacaoHora'));
    }

    /**
     * Atualiza a solicitação.
     */
    public function update(Request $request, SolicitacaoHora $solicitacaoHora)
    {
        $this->authorize('update', $solicitacaoHora);

        $request->validate([
            'descricao' => 'required|string|max:1000',
            'carga_horaria' => 'required|integer|min:1',
            'arquivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['descricao', 'carga_horaria']);

        if ($request->hasFile('arquivo')) {
            $data['arquivo'] = $request->file('arquivo')->store('documentos', 'public');
        }

        $solicitacaoHora->update($data);

        return redirect()->route('solicitacoes.index')->with('success', 'Solicitação atualizada com sucesso!');
    }

    /**
     * Remove a solicitação.
     */
    public function destroy(SolicitacaoHora $solicitacaoHora)
    {
        $this->authorize('delete', $solicitacaoHora);

        $solicitacaoHora->delete();

        return redirect()->route('solicitacoes.index')->with('success', 'Solicitação excluída com sucesso!');
    }
}
