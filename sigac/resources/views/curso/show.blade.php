<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Curso') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-2">{{ $curso->nome }}</h2>
                    <p><strong>Sigla:</strong> {{ $curso->sigla }}</p>
                    <p><strong>Total de Horas:</strong> {{ $curso->total_horas }}</p>
                    <p><strong>Nível:</strong> {{ $curso->nivel->nome ?? 'N/A' }}</p>
                    <p><strong>Eixo:</strong> {{ $curso->eixo->nome ?? 'N/A' }}</p>
                    <p><strong>Criado em:</strong> {{ $curso->created_at }}</p>
                    <p><strong>Atualizado em:</strong> {{ $curso->updated_at }}</p>
                    <div class="mt-4">
                        <h3 class="font-semibold">Alunos</h3>
                        <ul class="list-disc ml-6">
                            @forelse($curso->aluno as $aluno)
                                <li>{{ $aluno->nome }}</li>
                            @empty
                                <li class="text-gray-400">Nenhum aluno cadastrado.</li>
                            @endforelse
                        </ul>
                        <h3 class="font-semibold mt-4">Categorias</h3>
                        <ul class="list-disc ml-6">
                            @forelse($curso->categoria as $categoria)
                                <li>{{ $categoria->nome }}</li>
                            @empty
                                <li class="text-gray-400">Nenhuma categoria cadastrada.</li>
                            @endforelse
                        </ul>
                        <h3 class="font-semibold mt-4">Turmas</h3>
                        <ul class="list-disc ml-6">
                            @forelse($curso->turma as $turma)
                                <li>{{ $turma->ano }}</li>
                            @empty
                                <li class="text-gray-400">Nenhuma turma cadastrada.</li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('coordenador.cursos.edit', $curso->id) }}" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">Editar</a>
                        <a href="{{ route('coordenador.cursos.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
