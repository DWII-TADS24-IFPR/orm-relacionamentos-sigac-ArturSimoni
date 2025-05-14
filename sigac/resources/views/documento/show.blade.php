
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Detlahes do Documento</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5>{{ $documento->descricao }}</h5>
        </div>
        <div class="card-body">
            <p><strong>URL:</strong> {{ $documento->url }}</p>
            <p><strong>Horas In:</strong> {{ $documento->horas_in }}</p>
            <p><strong>Status:</strong> {{ $documento->status }}</p>
            <p><strong>Comentario:</strong> {{ $documento->comentario }}</p>
            <p><strong>Horas Out:</strong> {{ $documento->horas_out }}</p>
            <p><strong>Categoria:</strong> {{ $documento->categoria->nome }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
            <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection
