<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Bem-vindo ao SIGAC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="container text-center bg-white p-5 rounded shadow" style="max-width: 480px;">
        <h1 class="mb-4 fw-bold">Bem-vindo ao SIGAC!</h1>

        <nav>
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary me-3 mb-2">Dashboard</a>

                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary mb-2">Sair</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary me-3 mb-2">Entrar</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-primary mb-2">Registrar</a>
                @endif
            @endauth
        </nav>
    </div>

    <!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
