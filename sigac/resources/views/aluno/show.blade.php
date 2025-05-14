
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Detalhes do Aluno</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5>{{ $aluno->nome }}</h5>
        </div>
        <div class="card-body">
            <p><strong>CPF:</strong> {{ $aluno->cpf }}</p>
            <p><strong>Email:</strong> {{ $aluno->email }}</p>
            <p><strong>Curso:</strong> {{ $aluno->curso->nome }}</p>
            <p><strong>Turma:</strong> {{ $aluno->curso->sigla }} {{ $aluno->turma->ano }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
            </form>
            <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection
