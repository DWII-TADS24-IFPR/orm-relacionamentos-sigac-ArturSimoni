
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Criar Turma</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('turmas.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" id="curso_id" class="form-select @error('curso_id') is-invalid @enderror">
                <option value="">Selecione um curso</option>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
            @error('curso_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ano" class="form-label">Ano</label>
            <input type="number" name="ano" id="ano" class="form-control @error('ano') is-invalid @enderror" value="{{ old('ano') }}">
            @error('ano')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Criar Turma</button>
        <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
