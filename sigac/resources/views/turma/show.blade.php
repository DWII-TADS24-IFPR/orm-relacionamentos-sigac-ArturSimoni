<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes da Turma') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-2">Ano: {{ $turma->ano }}</h2>
                    <p><strong>Curso:</strong> {{ $turma->curso->nome ?? 'N/A' }}</p>
                    <p><strong>Criado em:</strong> {{ $turma->created_at }}</p>
                    <p><strong>Atualizado em:</strong> {{ $turma->updated_at }}</p>
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('coordenador.turmas.edit', $turma->id) }}" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">Editar</a>
                        <a href="{{ route('coordenador.turmas.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Voltar</a>
                    </div>
                    <a href="{{ route('coordenador.turmas.grafico_horas', $turma->id) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition mt-4">Ver Gráfico de Horas Cumpridas</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
