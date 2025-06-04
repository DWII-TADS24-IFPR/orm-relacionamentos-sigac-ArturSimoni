<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel do Aluno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold mb-4">Bem-vindo de volta, {{ $aluno->nome ?? $user->name }}!</h2>

                    <h3 class="text-lg font-semibold mt-6 mb-2">Minhas Horas Cumpridas</h3>
                    @if(isset($horasCumpridas) && count($horasCumpridas))
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded mb-6">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">Documento</th>
                                        <th class="px-4 py-2">Horas</th>
                                        <th class="px-4 py-2">Status</th>
                                        <th class="px-4 py-2">Comentário</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($horasCumpridas as $hora)
                                        <tr>
                                            <td class="px-4 py-2">{{ $hora->documento->descricao ?? '-' }}</td>
                                            <td class="px-4 py-2">{{ $hora->horas }}</td>
                                            <td class="px-4 py-2">{{ $hora->status }}</td>
                                            <td class="px-4 py-2">{{ $hora->comentario }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="mb-6">Nenhuma hora cumprida registrada.</p>
                    @endif

                    <a href="{{ route('aluno.documentos.create') }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Submeter Novo Documento (PDF)</a>
                    <a href="{{ route('aluno.declaracao.pdf') }}" class="inline-block px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-700 transition ml-2">Gerar Declaração de Horas Aprovadas (PDF)</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
