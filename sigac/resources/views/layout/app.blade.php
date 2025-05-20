<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo', 'SIGAC')</title>
    @vite(['resources/js/app.js'])

</head>
<body>

    <div class="container">
        @include('componente.navbar')

        @yield('content')
    </div>


</body>
</html>
