
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Aluno') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('coordenador.alunos.update', $aluno->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="nome" class="block text-sm font-medium">Nome</label>
                            <input type="text" name="nome" id="nome" value="{{ old('nome', $aluno->nome) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
                            @error('nome')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="cpf" class="block text-sm font-medium">CPF</label>
                            <input type="text" name="cpf" id="cpf" value="{{ old('cpf', $aluno->cpf) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
                            @error('cpf')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $aluno->email) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
                            @error('email')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="senha" class="block text-sm font-medium">Senha</label>
                            <input type="password" name="senha" id="senha" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                            <small class="form-text text-muted">Deixe em branco para manter a senha atual.</small>
                            @error('senha')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="curso_id" class="block text-sm font-medium">Curso</label>
                            <select name="curso_id" id="curso_id" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
                                <option value="">Selecione um curso</option>
                                @foreach ($cursos as $curso)
                                    <option value="{{ $curso->id }}" {{ old('curso_id', $aluno->curso_id) == $curso->id ? 'selected' : '' }}>{{ $curso->nome }}</option>
                                @endforeach
                            </select>
                            @error('curso_id')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="turma_id" class="block text-sm font-medium">Turma</label>
                            <select name="turma_id" id="turma_id" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
                                <option value="">Selecione uma turma</option>
                                @foreach($turmas as $turma)
                                    @if(old('curso_id', $aluno->curso_id) == $turma->curso_id)
                                        <option value="{{ $turma->id }}" {{ old('turma_id', $aluno->turma_id) == $turma->id ? 'selected' : '' }}>{{ $turma->ano }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('turma_id')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex gap-2">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Atualizar</button>
                            <a href="{{ route('coordenador.alunos.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.getElementById('curso_id').addEventListener('change', function () {
        const cursoId = this.value;
        const turmaSelect = document.getElementById('turma_id');
        turmaSelect.innerHTML = '<option value="">Selecione uma turma</option>';
        if (cursoId) {
            fetch(`/coordenador/turmas/get/${cursoId}`)
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
