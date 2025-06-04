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
    <body class="font-sans min-h-screen bg-gray-950 text-gray-100 flex flex-col">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-gray-900 shadow border-b border-gray-800">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="flex-1 flex flex-col items-center justify-center py-8 px-4">
            <div class="w-full max-w-5xl bg-gray-900 shadow-xl rounded-2xl border border-gray-800 p-8">
                {{ $slot }}
            </div>
        </main>

        <footer class="py-6 text-center text-gray-400 text-sm bg-gray-900 border-t border-gray-800">
            &copy; {{ date('Y') }} SIGAC - Sistema de Gestão de Atividades Complementares
        </footer>
    </body>
</html>
