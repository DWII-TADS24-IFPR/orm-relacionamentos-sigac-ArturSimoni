<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Documento') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-2">Documento #{{ $documento->id }}</h2>
                    <p><strong>URL:</strong> {{ $documento->url }}</p>
                    <p><strong>Descrição:</strong> {{ $documento->descricao }}</p>
                    <p><strong>Horas In:</strong> {{ $documento->horas_in }}</p>
                    <p><strong>Horas Out:</strong> {{ $documento->horas_out }}</p>
                    <p><strong>Status:</strong> {{ $documento->status }}</p>
                    <p><strong>Comentário:</strong> {{ $documento->comentario }}</p>
                    <p><strong>Categoria:</strong> {{ $documento->categoria->nome ?? '-' }}</p>
                    <p><strong>Arquivo:</strong>
                        @if(Str::endsWith($documento->url, '.pdf'))
                            <a href="{{ asset('storage/' . $documento->url) }}" target="_blank" class="text-blue-500 underline">Visualizar PDF</a>
                        @else
                            <a href="{{ $documento->url }}" target="_blank" class="text-blue-500 underline">Abrir Link</a>
                        @endif
                    </p>
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('coordenador.documentos.edit', $documento->id) }}" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">Editar</a>
                        <a href="{{ route('coordenador.documentos.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Voltar</a>
                        @if(auth()->user()->role && auth()->user()->role->nome === 'coordenador' && $documento->status === 'Pendente')
                        <form action="{{ route('coordenador.documentos.aprovar', $documento->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            <input type="number" name="horas_out" value="{{ $documento->horas_in }}" min="0" step="0.01" class="w-24 rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
                            <input type="text" name="comentario" placeholder="Comentário (opcional)" class="w-48 rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 ml-2">
                            <button type="submit" class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition ml-2">Aprovar</button>
                        </form>
                        <form action="{{ route('coordenador.documentos.reprovar', $documento->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            <input type="text" name="comentario" placeholder="Comentário (motivo da reprovação)" class="w-48 rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 ml-2">
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition ml-2">Reprovar</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
