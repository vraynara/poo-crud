<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Netflix</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#141414] flex justify-center items-center min-h-screen">

    <div class="bg-[#1f1f1f] w-[400px] p-10 rounded-xl shadow-2xl">

        <h1 class="text-center text-red-600 text-4xl font-bold mb-8">
            NETFLIX
        </h1>

        @if(session('erro'))
            <div class="bg-red-600 text-white p-3 rounded mb-4">
                {{ session('erro') }}
            </div>
        @endif

        <form method="POST" action="/login">

            @csrf

            <div class="mb-4">

                <label class="block text-white mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full p-3 rounded text-black"
                    placeholder="Digite seu email"
                    required>

            </div>

            <div class="mb-6">

                <label class="block text-white mb-2">
                    Senha
                </label>

                <input
                    type="password"
                    name="senha"
                    class="w-full p-3 rounded text-black"
                    placeholder="Digite sua senha"
                    required>

            </div>

            <button
                type="submit"
                class="w-full bg-red-600 hover:bg-red-700 p-3 rounded">

                Entrar

            </button>

        </form>

    </div>

</body>
</html>