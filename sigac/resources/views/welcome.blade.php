
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGAC - Sistema de Gestão de Atividades Complementares</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen bg-gradient-to-tr from-blue-100 via-white to-blue-200 dark:from-blue-950 dark:via-blue-900 dark:to-blue-800 flex flex-col">
    <header class="w-full px-8 py-6 flex justify-between items-center bg-white/80 dark:bg-blue-950/80 shadow-md">
        <span class="font-extrabold text-2xl text-blue-800 dark:text-blue-200 tracking-widest">SIGAC</span>
        @if (Route::has('login'))
            <nav class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-6 py-2 rounded-full border-2 border-blue-200 dark:border-blue-700 text-blue-800 dark:text-blue-100 font-semibold hover:bg-blue-700 hover:text-white dark:hover:bg-blue-500 transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2 rounded-full border-2 border-blue-200 dark:border-blue-700 text-blue-800 dark:text-blue-100 font-semibold hover:bg-blue-700 hover:text-white dark:hover:bg-blue-500 transition">Entrar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-6 py-2 rounded-full border-2 border-blue-700 text-blue-700 dark:text-blue-200 font-semibold hover:bg-blue-50 dark:bg-blue-950 dark:hover:bg-blue-900 transition">Registrar</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <main class="flex-1 flex flex-col items-center justify-center gap-12 px-6 py-12">
        <section class="w-full max-w-2xl flex flex-col justify-center items-center text-center">
            <h1 class="text-4xl lg:text-6xl font-black mb-6 text-blue-900 dark:text-blue-200 leading-tight drop-shadow">Sua vida acadêmica mais organizada</h1>
            <p class="text-lg text-blue-900/80 dark:text-blue-100/80 mb-8">O SIGAC é o sistema ideal para gerenciar, acompanhar e validar suas atividades complementares universitárias. Simples, rápido e eficiente para alunos e coordenadores.</p>
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="inline-block px-8 py-3 bg-blue-700 dark:bg-blue-500 text-white font-semibold rounded shadow hover:bg-blue-900 dark:hover:bg-blue-700 transition text-lg">Acessar o sistema</a>
            @endif
        </section>
        <aside class="w-full max-w-md flex items-center justify-center">
            <div class="relative flex justify-center w-full">
                <div class="absolute -top-8 -left-8 w-32 h-32 bg-blue-200 dark:bg-blue-900 rounded-full blur-2xl opacity-60"></div>
                <img src="https://img.freepik.com/vetores-gratis/ideia-de-estrategia-de-crescimento-de-lucro-solucao-de-desenvolvimento-de-negocios_335657-3160.jpg" class="rounded-2xl shadow-2xl border-4 border-blue-100 dark:border-blue-800 relative z-10">
                <div class="absolute -bottom-8 -right-8 w-24 h-24 bg-blue-400 dark:bg-blue-700 rounded-full blur-2xl opacity-40"></div>
            </div>
        </aside>
    </main>
    <footer class="py-6 text-center text-blue-900 dark:text-blue-200 text-sm bg-white/60 dark:bg-blue-950/60 border-t border-blue-100 dark:border-blue-800">
        &copy; {{ date('Y') }} SIGAC - Sistema de Gestão de Atividades Complementares
    </footer>
</body>
</html>
