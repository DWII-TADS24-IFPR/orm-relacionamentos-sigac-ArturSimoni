
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Comprovantes</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('comprovantes.create') }}" class="btn btn-primary mb-3">Criar Novo Comprovante</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Horas</th>
                <th>Atividade</th>
                <th>Categoria</th>
                <th>Aluno</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comprovantes as $comprovante)
                <tr>
                    <td>{{ $comprovante->id }}</td>
                    <td>{{ $comprovante->horas }}</td>
                    <td>{{ $comprovante->atividade }}</td>
                    <td>{{ $comprovante->categoria->nome }}</td>
                    <td>{{ $comprovante->aluno->nome }}</td>
                    <td>
                        <a href="{{ route('comprovantes.show', $comprovante->id) }}" class="btn btn-info">Visualizar</a>
                        <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('comprovantes.destroy', $comprovante->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este comprovante?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $comprovantes->links() }}
</div>
@endsection
