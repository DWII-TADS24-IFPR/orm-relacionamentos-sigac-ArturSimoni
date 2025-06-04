<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comprovantes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('coordenador.comprovantes.create') }}" class="inline-block mb-4 px-4 py-2 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Criar Novo Comprovante</a>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Horas</th>
                                    <th class="px-4 py-2">Atividade</th>
                                    <th class="px-4 py-2">Categoria</th>
                                    <th class="px-4 py-2">Aluno</th>
                                    <th class="px-4 py-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comprovantes as $comprovante)
                                    <tr>
                                        <td class="px-4 py-2">{{ $comprovante->horas }}</td>
                                        <td class="px-4 py-2">{{ $comprovante->atividade }}</td>
                                        <td class="px-4 py-2">{{ $comprovante->categoria->nome ?? '' }}</td>
                                        <td class="px-4 py-2">{{ $comprovante->aluno->nome ?? '' }}</td>
                                        <td class="px-4 py-2 space-x-2">
                                            <a href="{{ route('coordenador.comprovantes.show', $comprovante->id) }}" class="inline-block px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Ver</a>
                                            <a href="{{ route('coordenador.comprovantes.edit', $comprovante->id) }}" class="inline-block px-3 py-1 bg-yellow-600 text-white rounded hover:bg-yellow-700 transition ml-2">Editar</a>
                                            <form action="{{ route('coordenador.comprovantes.destroy', $comprovante->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $comprovantes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
