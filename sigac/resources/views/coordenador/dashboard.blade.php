<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel do Coordenador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold mb-4">Bem-vindo de volta, {{ Auth::user()->name }}!</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <a href="{{ route('coordenador.alunos.index') }}" class="block p-4 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Gerenciar Alunos</a>
                        <a href="{{ route('coordenador.categorias.index') }}" class="block p-4 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Gerenciar Categorias</a>
                        <a href="{{ route('coordenador.comprovantes.index') }}" class="block p-4 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Gerenciar Comprovantes</a>
                        <a href="{{ route('coordenador.cursos.index') }}" class="block p-4 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Gerenciar Cursos</a>
                        <a href="{{ route('coordenador.declaracoes.index') }}" class="block p-4 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Gerenciar Declarações</a>
                        <a href="{{ route('coordenador.documentos.index') }}" class="block p-4 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Gerenciar Documentos</a>
                        <a href="{{ route('coordenador.eixos.index') }}" class="block p-4 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Gerenciar Eixos</a>
                        <a href="{{ route('coordenador.niveis.index') }}" class="block p-4 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Gerenciar Níveis</a>
                        <a href="{{ route('coordenador.turmas.index') }}" class="block p-4 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Gerenciar Turmas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
