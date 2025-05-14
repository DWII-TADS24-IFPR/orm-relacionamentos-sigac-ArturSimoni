
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Editar Comprovante</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('comprovantes.update', $comprovante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="horas" class="form-label">Horas</label>
            <input type="number" class="form-control" id="horas" name="horas" value="{{ old('horas', $comprovante->horas) }}" required>
            @error('horas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="atividade" class="form-label">Atividade</label>
            <input type="text" class="form-control" id="atividade" name="atividade" value="{{ old('atividade', $comprovante->atividade) }}" required>
            @error('atividade')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select class="form-select" id="categoria_id" name="categoria_id" required>
                <option value="">Selecione uma categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ (old('categoria_id', $comprovante->categoria_id) == $categoria->id) ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select class="form-select" id="aluno_id" name="aluno_id" required>
                <option value="">Selecione um aluno</option>
                @foreach ($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ (old('aluno_id', $comprovante->aluno_id) == $aluno->id) ? 'selected' : '' }}>
                        {{ $aluno->nome }}
                    </option>
                @endforeach
            </select>
            @error('aluno_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Comprovante</button>
        <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
