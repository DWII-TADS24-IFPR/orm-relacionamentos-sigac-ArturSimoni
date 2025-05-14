@extends('layout.app')

@section('content')
<div class="container">
    <h1>Criar Declaração</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('declaracoes.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="hash" class="form-label">Hash</label>
            <input type="text" class="form-control" id="hash" name="hash" value="{{ old('hash') }}">
            @error('hash')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="datetime-local" class="form-control" id="data" name="data" value="{{ old('data') }}">
            @error('data')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select class="form-select" id="aluno_id" name="aluno_id">
                <option value="">Selecione um Aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>{{ $aluno->nome }}</option>
                @endforeach
            </select>
            @error('aluno_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="comprovante_id" class="form-label">Comprovante</label>
            <select class="form-select" id="comprovante_id" name="comprovante_id">
                <option value="">Selecione um Comprovante</option>
                @foreach($comprovantes as $comprovante)
                    <option value="{{ $comprovante->id }}" {{ old('comprovante_id') == $comprovante->id ? 'selected' : '' }}>{{ $comprovante->atividade }}</option>
                @endforeach
            </select>
            @error('comprovante_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Criar Declaração</button>
        <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
