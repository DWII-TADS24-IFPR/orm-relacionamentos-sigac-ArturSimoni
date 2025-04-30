<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])
    <title>@yield('title', 'SIGAC')</title>
</head>
<body>
    <div class="container">
        <h1>SIGAC - Sistema de Gerenciamento de Atividades Complementares</h1>
        @yield('content')
    </div>
    
</body>
</html>