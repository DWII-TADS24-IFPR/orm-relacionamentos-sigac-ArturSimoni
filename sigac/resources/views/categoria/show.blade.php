
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes da Categoria') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-2">{{ $categoria->nome }}</h2>
                    <p><strong>Máximo de Horas:</strong> {{ $categoria->maximo_horas }}</p>
                    <p><strong>Curso:</strong> {{ $categoria->curso->nome ?? '-' }}</p>
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('coordenador.categorias.edit', $categoria->id) }}" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">Editar</a>
                        <a href="{{ route('coordenador.categorias.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
