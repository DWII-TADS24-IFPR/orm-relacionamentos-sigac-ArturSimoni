@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Dashboard do Aluno</h2>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total de Declarações Enviadas</h5>
                    <p class="display-5">{{ $totalDeclaracoes }}</p>
                </div>
            </div>
        </div>
    </div>

    <h4>Última Declaração Enviada</h4>
    @if ($ultimaDeclaracao)
        <div class="card">
            <div class="card-body">
                <p><strong>Hash:</strong> {{ $ultimaDeclaracao->hash }}</p>
                <p><strong>Data:</strong>
                    @if ($ultimaDeclaracao->data)
                        {{ \Carbon\Carbon::parse($ultimaDeclaracao->data)->format('d/m/Y') }}
                    @else
                        Data não informada
                    @endif
                </p>
            </div>
        </div>
    @else
        <p class="text-muted">Nenhuma declaração enviada ainda.</p>
    @endif
</div>
@endsection
