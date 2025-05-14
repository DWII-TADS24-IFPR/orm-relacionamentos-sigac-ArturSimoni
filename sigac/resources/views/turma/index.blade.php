
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Turmas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('turmas.create') }}" class="btn btn-primary mb-3">Criar Nova Turma</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ano</th>
                <th>Curso</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($turmas as $turma)
                <tr>
                    <td>{{ $turma->id }}</td>
                    <td>{{ $turma->ano }}</td>
                    <td>{{ $turma->curso->nome }}</td>
                    <td>
                        <a href="{{ route('turmas.show', $turma->id) }}" class="btn btn-info">Visualizar</a>
                        <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta turma?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
