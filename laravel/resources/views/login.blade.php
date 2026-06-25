<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Netflix</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-body">

    <div class="login-container">

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <h1>NETFLIX</h1>

            <div class="input-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Digite seu email"
                    value="{{ old('email') }}"
                    required>
            </div>

            <div class="input-group">
                <label for="password">Senha</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Digite sua senha"
                    required>
            </div>

            <button type="submit" class="btn-entrar">Entrar</button>

        </form>

        @if($errors->any())
            <p class="erro-msg">{{ $errors->first() }}</p>
        @endif

    </div>

</body>
</html>
