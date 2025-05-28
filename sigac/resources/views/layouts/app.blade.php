<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'SIGAC') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light text-dark" style="font-family: 'Figtree', sans-serif;">

    <div class="d-flex flex-column min-vh-100">

        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white border-bottom shadow-sm">
                <div class="container-lg py-4 px-4">
                    <h1 class="h4 fw-semibold text-primary mb-0">
                        {{ $header }}
                    </h1>
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="flex-grow-1 container-lg py-5 px-4">
            <div class="bg-white shadow rounded-4 p-4">
                @yield('content')
            </div>
        </main>

    </div>

    <!-- Bootstrap JS Bundle with Popper (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
