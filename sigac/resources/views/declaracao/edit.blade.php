
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Declaração') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('coordenador.declaracoes.update', $declaracao->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="hash" class="block text-sm font-medium">Hash</label>
                            <input type="text" id="hash" name="hash" value="{{ old('hash', $declaracao->hash) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" />
                            @error('hash')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="data" class="block text-sm font-medium">Data</label>
                            <input type="datetime-local" id="data" name="data" value="{{ old('data', $declaracao->data) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" />
                            @error('data')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="aluno_id" class="block text-sm font-medium">Aluno</label>
                            <select id="aluno_id" name="aluno_id" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                                <option value="">Selecione um Aluno</option>
                                @foreach($alunos as $aluno)
                                    <option value="{{ $aluno->id }}" {{ old('aluno_id', $declaracao->aluno_id) == $aluno->id ? 'selected' : '' }}>{{ $aluno->nome }}</option>
                                @endforeach
                            </select>
                            @error('aluno_id')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="comprovante_id" class="block text-sm font-medium">Comprovante</label>
                            <select id="comprovante_id" name="comprovante_id" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                                <option value="">Selecione um Comprovante</option>
                                @foreach($comprovantes as $comprovante)
                                    <option value="{{ $comprovante->id }}" {{ old('comprovante_id', $declaracao->comprovante_id) == $comprovante->id ? 'selected' : '' }}>{{ $comprovante->atividade }}</option>
                                @endforeach
                            </select>
                            @error('comprovante_id')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex gap-2">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Atualizar</button>
                            <a href="{{ route('coordenador.declaracoes.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
