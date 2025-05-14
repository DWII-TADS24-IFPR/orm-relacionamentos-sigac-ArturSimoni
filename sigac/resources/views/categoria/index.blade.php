@extends('layout.app')

@section('content')
<div class="container">
    <h1>Categorias</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Criar Nova Categoria</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Máximo de Horas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nome }}</td>
                    <td>{{ $categoria->maximo_horas }}</td>
                    <td>
                        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info">Visualizar</a>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta categoria?');">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
