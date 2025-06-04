<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIGAC') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans min-h-screen bg-gradient-to-tr from-blue-100 via-white to-blue-200 dark:from-blue-950 dark:via-blue-900 dark:to-blue-800 flex flex-col">
        <header class="w-full px-8 py-6 flex justify-center items-center bg-white/80 dark:bg-blue-950/80 shadow-md">
            <a href="/" class="font-extrabold text-2xl text-blue-800 dark:text-blue-200 tracking-widest">SIGAC</a>
        </header>
        <main class="flex-1 flex flex-col items-center justify-center py-8 px-4">
            <div class="w-full max-w-md bg-white/90 dark:bg-blue-950/80 shadow-xl rounded-2xl border border-blue-100 dark:border-blue-800 p-8 flex flex-col items-center">
                {{ $slot }}
            </div>
        </main>
        <footer class="py-6 text-center text-blue-900 dark:text-blue-200 text-sm bg-white/60 dark:bg-blue-950/60 border-t border-blue-100 dark:border-blue-800">
            &copy; {{ date('Y') }} SIGAC - Sistema de Gestão de Atividades Complementares
        </footer>
    </body>
</html>
