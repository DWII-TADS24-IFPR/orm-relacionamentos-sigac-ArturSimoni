@extends('layout.app')

@section('content')
<div class="container">
    <h1>Criar Novo Curso</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sigla" class="form-label">Sigla</label>
            <input type="text" class="form-control" id="sigla" name="sigla" value="{{ old('sigla') }}" required>
            @error('sigla')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total_horas" class="form-label">Total de Horas</label>
            <input type="number" class="form-control" id="total_horas" name="total_horas" value="{{ old('total_horas') }}" required>
            @error('total_horas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nivel_id" class="form-label">Nível</label>
            <select class="form-select" id="nivel_id" name="nivel_id" required>
                <option value="">Selecione um nível</option>
                @foreach ($niveis as $nivel)
                    <option value="{{ $nivel->id }}" {{ old('nivel_id') == $nivel->id ? 'selected' : '' }}>{{ $nivel->nome }}</option>
                @endforeach
            </select>
            @error('nivel_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="eixo_id" class="form-label">Eixo</label>
            <input type="number" class="form-control" id="eixo_id" name="eixo_id" value="{{ old('eixo_id') }}">
            @error('eixo_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Criar Curso</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
