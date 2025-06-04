<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Novo Documento') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('coordenador.documentos.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label for="url" class="block text-sm font-medium">URL do PDF</label>
                            <input type="text" name="url" id="url" value="{{ old('url') }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                            <small class="text-gray-400">Opcional: Cole aqui a URL de um PDF já existente, se necessário.</small>
                        </div>

                        <div>
                            <label for="descricao" class="block text-sm font-medium">Descrição</label>
                            <input type="text" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" id="descricao" name="descricao" value="{{ old('descricao') }}" required>
                            @error('descricao')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="horas_in" class="block text-sm font-medium">Horas In</label>
                            <input type="number" step="0.01" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" id="horas_in" name="horas_in" value="{{ old('horas_in') }}" required>
                            @error('horas_in')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium">Status</label>
                            <input type="text" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" id="status" name="status" value="{{ old('status') }}" required>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="comentario" class="block text-sm font-medium">Comentário</label>
                            <textarea class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" id="comentario" name="comentario" required>{{ old('comentario') }}</textarea>
                            @error('comentario')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="horas_out" class="block text-sm font-medium">Horas Out</label>
                            <input type="number" step="0.01" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" id="horas_out" name="horas_out" value="{{ old('horas_out') }}" required>
                            @error('horas_out')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="categoria_id" class="block text-sm font-medium">Categoria</label>
                            <select class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" id="categoria_id" name="categoria_id" required>
                                <option value="">Selecione uma categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Criar Documento</button>
                            <a href="{{ route('coordenador.documentos.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
