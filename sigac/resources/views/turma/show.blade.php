
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Detalhes da Turma</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Turma: {{ $turma->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Curso: {{ $turma->curso->nome }}</h5>
            <p class="card-text">Ano: {{ $turma->ano }}</p>
            <p class="card-text">Alunos:</p>
            <ul>
                @foreach ($turma->aluno as $aluno)
                    <li>{{ $aluno->nome }} ({{ $aluno->cpf }})</li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
            <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection
