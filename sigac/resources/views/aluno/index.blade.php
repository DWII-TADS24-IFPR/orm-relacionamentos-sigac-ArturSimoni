<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Alunos') }}
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
                    <a href="{{ route('coordenador.alunos.create') }}" class="inline-block mb-4 px-4 py-2 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Adicionar Aluno</a>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">CPF</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Nome do Curso</th>
                                    <th class="px-4 py-2">Nome da Turma</th>
                                    <th class="px-4 py-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alunos as $aluno)
                                    <tr>
                                        <td class="px-4 py-2">{{ $aluno->id }}</td>
                                        <td class="px-4 py-2">{{ $aluno->nome }}</td>
                                        <td class="px-4 py-2">{{ $aluno->cpf }}</td>
                                        <td class="px-4 py-2">{{ $aluno->email }}</td>
                                        <td class="px-4 py-2">{{ $aluno->curso->nome }}</td>
                                        <td class="px-4 py-2">{{ $aluno->curso->sigla }} {{ $aluno->turma->ano }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex flex-wrap gap-2">
                                                <a href="{{ route('coordenador.alunos.show', $aluno->id) }}" class="inline-block px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Ver</a>
                                                <a href="{{ route('coordenador.alunos.edit', $aluno->id) }}" class="inline-block px-3 py-1 bg-yellow-600 text-white rounded hover:bg-yellow-700 transition">Editar</a>
                                                <form action="{{ route('coordenador.alunos.destroy', $aluno->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir este aluno?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">Excluir</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
