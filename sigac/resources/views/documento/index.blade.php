
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Documentos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('documentos.create') }}" class="btn btn-primary mb-3">Criar Novo Documento</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>URL</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $documento)
                <tr>
                    <td>{{ $documento->id }}</td>
                    <td>{{ $documento->url }}</td>
                    <td>{{ $documento->descricao }}</td>
                    <td>
                        <a href="{{ route('documentos.show', $documento->id) }}" class="btn btn-info">Visualizar</a>
                        <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este documento?');">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
