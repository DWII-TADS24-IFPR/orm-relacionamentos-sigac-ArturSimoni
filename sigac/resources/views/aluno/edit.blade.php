
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Editar Aluno</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $aluno->nome) }}" required>
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf', $aluno->cpf) }}" required>
            @error('cpf')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $aluno->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha">
            <small class="form-text text-muted">Deixe em branco para manter a senha atual.</small>
            @error('senha')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select class="form-select" id="curso_id" name="curso_id" required>
                <option value="">Selecione um curso</option>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
            @error('curso_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="turma_id" class="form-label">Turma</label>
            <select class="form-select" id="turma_id" name="turma_id" required>
                <option value="">Selecione uma turma</option>
            </select>
            @error('turma_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Aluno</button>
        <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
    document.getElementById('curso_id').addEventListener('change', function () {
        const cursoId = this.value;
        const turmaSelect = document.getElementById('turma_id');

        turmaSelect.innerHTML = '<option value="">Selecione uma turma</option>';

        if (cursoId) {
            fetch(`/turmas/get/${cursoId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(turma => {
                        const option = document.createElement('option');
                        option.value = turma.id;
                        option.textContent = turma.ano;
                        turmaSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Erro ao carregar turmas:', error));
        }
    });
</script>
@endsection
