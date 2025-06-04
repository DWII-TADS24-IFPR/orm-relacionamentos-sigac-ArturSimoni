<nav x-data="{ open: false }" class="bg-black border-b border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="font-extrabold text-xl text-white tracking-widest uppercase">
                        SIGAC
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if(Auth::check() && Auth::user()->role)
                        @if(Auth::user()->role->nome == 'aluno')
                            <x-nav-link :href="route('aluno.dashboard')" :active="request()->routeIs('aluno.dashboard*')" class="text-white">
                                {{ __('Painel Aluno') }}
                            </x-nav-link>
                            <x-nav-link :href="route('aluno.declaracao.pdf')" class="text-white">
                                {{ __('Gerar Declaração PDF') }}
                            </x-nav-link>
                            <x-nav-link :href="route('aluno.documentos.create')" class="text-white">
                                {{ __('Submeter Documento') }}
                            </x-nav-link>
                        @elseif(Auth::user()->role->nome == 'coordenador')
                            <x-nav-link :href="route('coordenador.alunos.index')" class="text-white">
                                {{ __('Alunos') }}
                            </x-nav-link>
                            <x-nav-link :href="route('coordenador.turmas.index')" class="text-white">
                                {{ __('Turmas') }}
                            </x-nav-link>
                            <x-nav-link :href="route('coordenador.cursos.index')" class="text-white">
                                {{ __('Cursos') }}
                            </x-nav-link>
                            <x-nav-link :href="route('coordenador.comprovantes.index')" class="text-white">
                                {{ __('Comprovantes') }}
                            </x-nav-link>
                            <x-nav-link :href="route('coordenador.declaracoes.index')" class="text-white">
                                {{ __('Declarações') }}
                            </x-nav-link>
                            <x-nav-link :href="route('coordenador.documentos.index')" class="text-white">
                                {{ __('Documentos') }}
                            </x-nav-link>
                            <x-nav-link :href="route('coordenador.categorias.index')" class="text-white">
                                {{ __('Categorias') }}
                            </x-nav-link>
                            <x-nav-link :href="route('coordenador.eixos.index')" class="text-white">
                                {{ __('Eixos') }}
                            </x-nav-link>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-black">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-black">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-300 hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-black border-t border-gray-700">
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::check() && Auth::user()->role)
                @if(Auth::user()->role->nome == 'aluno')
                    <x-responsive-nav-link :href="route('aluno.dashboard')" class="text-white">
                        {{ __('Painel Aluno') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('aluno.declaracao.pdf')" class="text-white">
                        {{ __('Gerar Declaração PDF') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('aluno.documentos.create')" class="text-white">
                        {{ __('Submeter Documento') }}
                    </x-responsive-nav-link>
                @elseif(Auth::user()->role->nome == 'coordenador')
                    <x-responsive-nav-link :href="route('coordenador.alunos.index')" class="text-white">
                        {{ __('Alunos') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('coordenador.turmas.index')" class="text-white">
                        {{ __('Turmas') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('coordenador.cursos.index')" class="text-white">
                        {{ __('Cursos') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('coordenador.comprovantes.index')" class="text-white">
                        {{ __('Comprovantes') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('coordenador.declaracoes.index')" class="text-white">
                        {{ __('Declarações') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('coordenador.documentos.index')" class="text-white">
                        {{ __('Documentos') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('coordenador.categorias.index')" class="text-white">
                        {{ __('Categorias') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('coordenador.eixos.index')" class="text-white">
                        {{ __('Eixos') }}
                    </x-responsive-nav-link>
                @endif
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" class="text-white"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
