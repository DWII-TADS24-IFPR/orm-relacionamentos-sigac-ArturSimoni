@extends('layout.app')

@section('content')
<div class="container">
    <h1>Criar Novo Nível</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('niveis.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Criar Nível</button>
        <a href="{{ route('niveis.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
