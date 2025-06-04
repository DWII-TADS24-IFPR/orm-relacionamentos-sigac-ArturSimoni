<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('coordenador.categorias.update', $categoria->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="nome" class="block text-sm font-medium">Nome</label>
                            <input type="text" name="nome" id="nome" value="{{ old('nome', $categoria->nome) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
                            @error('nome')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="maximo_horas" class="block text-sm font-medium">Máximo de Horas</label>
                            <input type="number" name="maximo_horas" id="maximo_horas" value="{{ old('maximo_horas', $categoria->maximo_horas) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
                            @error('maximo_horas')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="curso_id" class="block text-sm font-medium">Curso</label>
                            <select name="curso_id" id="curso_id" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
                                <option value="">Selecione um curso</option>
                                @foreach ($cursos as $curso)
                                    <option value="{{ $curso->id }}" {{ (old('curso_id', $categoria->curso_id) == $curso->id) ? 'selected' : '' }}>
                                        {{ $curso->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('curso_id')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Atualizar</button>
                            <a href="{{ route('coordenador.categorias.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
