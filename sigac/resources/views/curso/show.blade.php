
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Detalhes do Curso</h1>

    <div class="card">
        <div class="card-header">
            <h2>{{ $curso->nome }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Sigla:</strong> {{ $curso->sigla }}</p>
            <p><strong>Total de Horas:</strong> {{ $curso->total_horas }}</p>
            <p><strong>Nível:</strong> {{ $curso->nivel->nome ?? 'N/A' }}</p>
            <p><strong>Eixo:</strong> {{ $curso->eixo_id ?? 'N/A' }}</p>

            <h3>Alunos</h3>
            <ul>
                @foreach($curso->aluno as $aluno)
                    <li>{{ $aluno->nome }} ({{ $aluno->cpf }})</li>
                @endforeach
            </ul>

            <h3>Categorias</h3>
            <ul>
                @foreach($curso->categoria as $categoria)
                    <li>{{ $categoria->nome }}</li>
                @endforeach
            </ul>

            <h3>Turmas</h3>
            <ul>
                @foreach($curso->turma as $turma)
                    <li>Ano: {{ $turma->ano }}</li>
                @endforeach
            </ul>

            <div class="mt-3">
                <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
                <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
