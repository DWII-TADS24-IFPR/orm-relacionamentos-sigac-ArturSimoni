@extends('layouts.navigationaluno')

@section('content')
<div class="container">
    <h1>Bem-vindo, {{ $aluno->nome }}</h1>

    <div class="mb-3">
        <a href="{{ route('aluno.solicitarHoras') }}" class="btn btn-primary">Solicitar Horas Complementares</a>
        <a href="{{ route('aluno.gerarDeclaracao') }}" class="btn btn-success">Gerar Declaração</a>
    </div>

    <h3>Minhas Solicitações</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Carga Horária</th>
                <th>Status</th>
                <th>Arquivo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($aluno->solicitacoesHoras as $solicitacao)
            <tr>
                <td>{{ $solicitacao->descricao }}</td>
                <td>{{ $solicitacao->carga_horaria }} h</td>
                <td>
                    @if($solicitacao->status == 'pendente')
                        <span class="badge bg-warning text-dark">Pendente</span>
                    @elseif($solicitacao->status == 'aprovado')
                        <span class="badge bg-success">Aprovado</span>
                    @else
                        <span class="badge bg-danger">Recusado</span>
                    @endif
                </td>
                <td>
                    @if ($solicitacao->arquivo)
                        <a href="{{ asset('storage/' . $solicitacao->arquivo) }}" target="_blank">Ver arquivo</a>
                    @else
                        -
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Nenhuma solicitação encontrada.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
