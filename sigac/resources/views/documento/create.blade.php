@extends('layout.app')

@section('content')
<div class="container">
    <h1>Criar Documento</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('documentos.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}" required>
            @error('url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}" required>
            @error('descricao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="horas_in" class="form-label">Horas In</label>
            <input type="number" step="0.01" class="form-control" id="horas_in" name="horas_in" value="{{ old('horas_in') }}" required>
            @error('horas_in')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ old('status') }}" required>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="comentario" class="form-label">Comentário</label>
            <textarea class="form-control" id="comentario" name="comentario" required>{{ old('comentario') }}</textarea>
            @error('comentario')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="horas_out" class="form-label">Horas Out</label>
            <input type="number" step="0.01" class="form-control" id="horas_out" name="horas_out" value="{{ old('horas_out') }}" required>
            @error('horas_out')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select class="form-select" id="categoria_id" name="categoria_id" required>
                <option value="">Selecione uma categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
            @error('categoria_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Criar Documento</button>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
