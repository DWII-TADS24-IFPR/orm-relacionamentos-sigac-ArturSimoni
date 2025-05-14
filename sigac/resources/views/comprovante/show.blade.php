@extends('layout.app')

@section('content')
<div class="container">
    <h1>Detalhes do Comprovante</h1>

    <div class="card">
        <div class="card-header">
            Comprovante #{{ $comprovante->id }}
        </div>
        <div class="card-body">
            <p><strong>Horas:</strong> {{ $comprovante->horas }}</p>
            <p><strong>Atividade:</strong> {{ $comprovante->atividade }}</p>
            <p><strong>Categoria:</strong> {{ $comprovante->categoria->nome }}</p>
            <p><strong>Aluno:</strong> {{ $comprovante->aluno->nome }}</p>
            <p><strong>Criado em:</strong> {{ $comprovante->created_at }}</p>
            <p><strong>Atualizado em:</strong> {{ $comprovante->updated_at }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('comprovantes.destroy', $comprovante->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
        <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection
