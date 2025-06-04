
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Novo Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('coordenador.cursos.store') }}" method="POST" class="space-y-4">
                        @csrf
                        @method('POST')

                        <div>
                            <label for="nome" class="block text-sm font-medium">Nome</label>
                            <input type="text" name="nome" id="nome" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" value="{{ old('nome') }}" required>
                            @error('nome')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="sigla" class="block text-sm font-medium">Sigla</label>
                            <input type="text" name="sigla" id="sigla" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" value="{{ old('sigla') }}" required>
                            @error('sigla')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="total_horas" class="block text-sm font-medium">Total de Horas</label>
                            <input type="number" name="total_horas" id="total_horas" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" value="{{ old('total_horas') }}" required>
                            @error('total_horas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="nivel_id" class="block text-sm font-medium">Nível</label>
                            <select name="nivel_id" id="nivel_id" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
                                <option value="">Selecione um nível</option>
                                @foreach ($niveis as $nivel)
                                    <option value="{{ $nivel->id }}" {{ old('nivel_id') == $nivel->id ? 'selected' : '' }}>{{ $nivel->nome }}</option>
                                @endforeach
                            </select>
                            @error('nivel_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="eixo_id" class="block text-sm font-medium">Eixo</label>
                            <select name="eixo_id" id="eixo_id" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                                <option value="">Selecione um eixo</option>
                                @foreach ($eixos as $eixo)
                                    <option value="{{ $eixo->id }}" {{ old('eixo_id') == $eixo->id ? 'selected' : '' }}>{{ $eixo->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Criar Curso</button>
                            <a href="{{ route('coordenador.cursos.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
