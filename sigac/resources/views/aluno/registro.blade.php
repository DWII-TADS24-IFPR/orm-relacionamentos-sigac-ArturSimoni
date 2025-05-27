@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar-se como Aluno</h1>

    <form action="{{ route('aluno.registrar.store') }}" method="POST">
        @csrf

        <!-- Mesmos campos de nome, cpf, email, senha... -->

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control" value="{{ old('cpf') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select id="curso_id" name="curso_id" class="form-select" required>
                <option value="">Selecione um curso</option>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="turma_id" class="form-label">Turma</label>
            <select id="turma_id" name="turma_id" class="form-select" required>
                <option value="">Selecione uma turma</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Registrar</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<script>
    document.getElementById('curso_id').addEventListener('change', function () {
        const cursoId = this.value;
        const turmaSelect = document.getElementById('turma_id');

        turmaSelect.innerHTML = '<option value="">Carregando turmas...</option>';

        if (cursoId) {
            fetch(`/turmas/get/${cursoId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na requisição');
                    }
                    return response.json();
                })
                .then(data => {
                    turmaSelect.innerHTML = '<option value="">Selecione uma turma</option>';
                    data.forEach(turma => {
                        const option = document.createElement('option');
                        option.value = turma.id;
                        option.textContent = turma.ano;
                        turmaSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Erro ao carregar turmas:', error);
                    turmaSelect.innerHTML = '<option value="">Erro ao carregar</option>';
                });
        } else {
            turmaSelect.innerHTML = '<option value="">Selecione uma turma</option>';
        }
    });
</script>
@endsection
