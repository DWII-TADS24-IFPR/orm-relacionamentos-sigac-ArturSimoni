@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Lista de Níveis</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('niveis.create') }}" class="btn btn-primary mb-3">Novo Nível</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($niveis as $nivel)
                    <tr>
                        <td>{{ $nivel->id }}</td>
                        <td>{{ $nivel->nome }}</td>
                        <td>
                            <a href="{{ route('niveis.edit', $nivel->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
