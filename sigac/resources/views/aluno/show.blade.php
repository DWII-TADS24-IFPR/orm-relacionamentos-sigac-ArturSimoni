<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Aluno') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-2">{{ $aluno->nome }}</h2>
                    <p><strong>CPF:</strong> {{ $aluno->cpf }}</p>
                    <p><strong>Email:</strong> {{ $aluno->email }}</p>
                    <p><strong>Curso:</strong> {{ $aluno->curso->nome ?? '-' }}</p>
                    <p><strong>Turma:</strong> {{ $aluno->turma->ano ?? '-' }}</p>
                    <p><strong>Criado em:</strong> {{ $aluno->created_at }}</p>
                    <p><strong>Atualizado em:</strong> {{ $aluno->updated_at }}</p>
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('coordenador.alunos.edit', $aluno->id) }}" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">Editar</a>
                        <a href="{{ route('coordenador.alunos.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
