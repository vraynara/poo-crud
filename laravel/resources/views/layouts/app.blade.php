<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Netflix')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="home-body">

<header class="navbar">

    <h1 class="logo">NETFLIX</h1>

    <nav>
        <ul class="menu">
            <li><a href="{{ route('filmes.index') }}">Filmes</a></li>
            <li><a href="{{ route('series.index') }}">Séries</a></li>
            <li><a href="{{ route('usuarios.index') }}">Usuários</a></li>
            <li><a href="{{ route('logout') }}">Sair</a></li>
        </ul>
    </nav>

</header>

<div class="crud-box">

    @if(session('sucesso'))
        <div class="alerta alerta-sucesso">
            {{ session('sucesso') }}
        </div>
    @endif

    @if(session('erro'))
        <div class="alerta alerta-erro">
            {{ session('erro') }}
        </div>
    @endif

    @yield('conteudo')

</div>

</body>
</html>
