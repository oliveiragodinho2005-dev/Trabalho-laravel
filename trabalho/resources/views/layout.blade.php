<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        /* Tema claro /
        body.light {
            background-color: #ffffff;
            color: #000000;
        }

        / Tema escuro */
        body.dark {
            background-color: #121212;
            color: #eeeeee;
        }

        body.dark table,
        body.dark .card {
            background-color: #1e1e1e;
            color: #ffffff;
        }

        body.dark a,
        body.dark .btn {
            color: #ffffff;
        }
    </style>
</head>

<body class="{{ session('theme', 'light') }}">

<nav class="navbar navbar-expand-lg 
    {{ session('theme','light') === 'light' ? 'navbar-light bg-light' : 'navbar-dark bg-dark' }}">

    <div class="container">
        <a class="navbar-brand" href="{{ route('carros.index') }}">
            Sistema de Carros
        </a>

        <div class="d-flex">
            <a href="{{ route('theme.toggle') }}" class="btn btn-sm btn-outline-secondary">
                @if(session('theme', 'light') === 'light')
                    Modo Escuro
                @else
                    Modo Claro
                @endif
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>