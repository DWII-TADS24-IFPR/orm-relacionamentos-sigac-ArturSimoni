
@extends('layout.app')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <h3>{{ $nivel->nome }}</h5>
        </div>
        <div class="card-body">
            <h3>Cursos</h3>
            <ul>
                @foreach($nivel->curso as $curso)
                    <li>Curso: {{ $curso->nome }}</li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('niveis.edit', $nivel->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
            <a href="{{ route('niveis.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection
