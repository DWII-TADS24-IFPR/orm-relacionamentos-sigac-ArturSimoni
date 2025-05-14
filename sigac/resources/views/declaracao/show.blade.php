
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Detalhes da Declaração</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Declaração #{{ $declaracao->id }}
        </div>
        <div class="card-body">
            <p><strong>Hash:</strong> {{ $declaracao->hash }}</p>
            <p><strong>Data:</strong> {{ $declaracao->data }}</p>
            <p><strong>Aluno:</strong> {{ $declaracao->aluno->nome }}</p>
            <p><strong>Comprovante:</strong> {{ $declaracao->comprovante->atividade }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('declaracoes.edit', $declaracao->id) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('declaracoes.destroy', $declaracao->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
        <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>
@endsection
