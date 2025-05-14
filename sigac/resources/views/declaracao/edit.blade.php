
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Editar Declaração</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('declaracoes.update', $declaracao->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="hash" class="form-label">Hash</label>
            <input type="text" class="form-control @error('hash') is-invalid @enderror" id="hash" name="hash" value="{{ old('hash', $declaracao->hash) }}" required>
            @error('hash')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="datetime-local" class="form-control @error('data') is-invalid @enderror" id="data" name="data" value="{{ old('data', $declaracao->data) }}" required>
            @error('data')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select class="form-select @error('aluno_id') is-invalid @enderror" id="aluno_id" name="aluno_id" required>
                <option value="">Selecione um Aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ (old('aluno_id', $declaracao->aluno_id) == $aluno->id) ? 'selected' : '' }}>{{ $aluno->nome }}</option>
                @endforeach
            </select>
            @error('aluno_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="comprovante_id" class="form-label">Comprovante</label>
            <select class="form-select @error('comprovante_id') is-invalid @enderror" id="comprovante_id" name="comprovante_id" required>
                <option value="">Selecione um Comprovante</option>
                @foreach($comprovantes as $comprovante)
                    <option value="{{ $comprovante->id }}" {{ (old('comprovante_id', $declaracao->comprovante_id) == $comprovante->id) ? 'selected' : '' }}>{{ $comprovante->atividade }}</option>
                @endforeach
            </select>
            @error('comprovante_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
