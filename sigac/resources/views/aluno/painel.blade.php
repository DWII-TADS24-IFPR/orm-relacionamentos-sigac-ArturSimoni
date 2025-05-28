@extends('layouts.appaluno')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h1 class="mb-4 text-center fw-bold text-primary">
                            <i class="bi bi-person-circle"></i> Bem-vindo, {{ $aluno->nome }}
                        </h1>

                        <div class="mb-4 d-flex gap-2 justify-content-center flex-wrap">
                            <a href="{{ route('aluno.solicitar_horas') }}" class="btn btn-primary shadow-sm">
                                <i class="bi bi-plus-circle"></i> Solicitar Horas Complementares
                            </a>
                            <a href="{{ route('aluno.declaracao') }}" class="btn btn-success shadow-sm">
                                <i class="bi bi-file-earmark-text"></i> Gerar Declaração
                            </a>
                        </div>

                        <h3 class="mb-3 text-secondary">Minhas Solicitações</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle table-hover">
                                <thead class="table-light">
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
                                                    <a href="{{ asset('storage/' . $solicitacao->arquivo) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                                        <i class="bi bi-paperclip"></i> Ver arquivo
                                                    </a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Nenhuma solicitação encontrada.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
