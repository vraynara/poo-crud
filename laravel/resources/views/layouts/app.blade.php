<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Netflix Clone</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#141414] text-white min-h-screen">

<header class="fixed top-0 left-0 w-full z-50 bg-gradient-to-b from-black to-transparent">

    <div class="flex justify-between items-center px-10 py-5">

        <a href="/" class="text-red-600 text-5xl font-extrabold tracking-wider">
            NETFLIX
        </a>

        <nav>

            <ul class="flex items-center gap-6 text-sm md:text-base">

                <li>
                    <a href="/" class="hover:text-red-600 transition">
                        Home
                    </a>
                </li>

                <li>
                    <a href="/filmes" class="hover:text-red-600 transition">
                        Filmes
                    </a>
                </li>

                <li>
                    <a href="/series" class="hover:text-red-600 transition">
                        Séries
                    </a>
                </li>

                <li>
                    <a href="/usuarios" class="hover:text-red-600 transition">
                        Usuários
                    </a>
                </li>

                <li>
                    <a href="/login" class="hover:text-red-600 transition">
                        Login
                    </a>
                </li>

                <li>
                    <a href="/sair"
                       class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 transition">
                        Sair
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</header>

<main class="pt-20">

    @yield('content')

</main>

<footer class="bg-black mt-16 py-8 text-center text-zinc-400">

    <p>
        Netflix Clone - Laravel + Tailwind
    </p>

</footer>

</body>
</html>