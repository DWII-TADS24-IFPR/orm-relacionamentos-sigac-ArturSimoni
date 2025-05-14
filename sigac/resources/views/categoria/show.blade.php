
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Detalhes da Categoria</h1>

    <div class="card">
        <div class="card-header">
            <h5>{{ $categoria->nome }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Máximo de Horas:</strong> {{ $categoria->maximo_horas }}</p>
            <p><strong>Curso:</strong> {{ $categoria->curso->nome ?? 'N/A' }}</p>
            <p><strong>Criado em:</strong> {{ $categoria->created_at }}</p>
            <p><strong>Atualizado em:</strong> {{ $categoria->updated_at }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta categoria?');">Excluir</button>
            </form>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection
