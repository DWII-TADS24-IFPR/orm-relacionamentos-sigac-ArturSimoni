@extends('layout.app')

@section('content')
<div class="container">
    <h1>Lista de Alunos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('alunos.create') }}" class="btn btn-primary mb-3">Adicionar Aluno</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Nome do Curso</th>
                <th>Nome da Turma</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->id }}</td>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->cpf }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>{{ $aluno->curso->nome }}</td>
                    <td>{{ $aluno->curso->sigla }} {{ $aluno->turma->ano }}</td>
                    <td>
                        <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-info">Visualizar</a>
                        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
