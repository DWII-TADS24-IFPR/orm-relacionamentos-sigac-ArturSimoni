
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Cursos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Criar Novo Curso</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sigla</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->nome }}</td>
                    <td>{{ $curso->sigla }}</td>
                    <td>
                        <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-info">Visualizar</a>
                        <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este curso?');">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
