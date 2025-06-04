
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Documento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('coordenador.documentos.update', $documento->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="url" class="block text-sm font-medium">URL do PDF</label>
                            <input type="text" name="url" id="url" value="{{ old('url', $documento->url) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" readonly>
                            <a href="{{ asset('storage/' . $documento->url) }}" target="_blank" class="text-blue-500 underline">Visualizar PDF</a>
                        </div>

                        <div>
                            <label for="descricao" class="block text-sm font-medium">Descrição</label>
                            <input type="text" name="descricao" id="descricao" value="{{ old('descricao', $documento->descricao) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                            @error('descricao')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="horas_in" class="block text-sm font-medium">Horas In</label>
                            <input type="number" name="horas_in" id="horas_in" value="{{ old('horas_in', $documento->horas_in) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                            @error('horas_in')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium">Status</label>
                            <input type="text" name="status" id="status" value="{{ old('status', $documento->status) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="comentario" class="block text-sm font-medium">Comentário</label>
                            <textarea name="comentario" id="comentario" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">{{ old('comentario', $documento->comentario) }}</textarea>
                            @error('comentario')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="horas_out" class="block text-sm font-medium">Horas Out</label>
                            <input type="number" name="horas_out" id="horas_out" value="{{ old('horas_out', $documento->horas_out) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                            @error('horas_out')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="categoria_id" class="block text-sm font-medium">Categoria</label>
                            <select name="categoria_id" id="categoria_id" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $documento->categoria_id == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Atualizar Documento</button>
                            <a href="{{ route('coordenador.documentos.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
