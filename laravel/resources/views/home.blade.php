@extends('layouts.app')

@section('content')

<section
class="relative h-screen bg-cover bg-center flex items-center"
style="background-image:
linear-gradient(to right, rgba(0,0,0,.95), rgba(0,0,0,.4)),
url('https://wallpapercave.com/wp/wp4056410.jpg')">

```
<div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black"></div>

<div class="relative z-10 max-w-3xl px-16">

    <h1 class="text-7xl font-extrabold mb-6">
        Dark
    </h1>

    <p class="text-xl leading-8 text-zinc-200 mb-8">
        Quando duas crianças desaparecem em uma pequena cidade alemã,
        segredos familiares e viagens no tempo revelam uma trama
        que atravessa gerações.
    </p>

    <div class="flex gap-4">

        <button
        class="bg-white text-black px-8 py-3 rounded font-bold hover:bg-zinc-300 transition">
            ▶ Assistir
        </button>

        <button
        class="bg-zinc-700/80 px-8 py-3 rounded font-bold hover:bg-zinc-600 transition">
            ℹ Mais Informações
        </button>

    </div>

</div>
```

</section>

<section class="px-10 py-8">

```
<h2 class="text-3xl font-bold mb-6">
    🔥 Populares na Netflix
</h2>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">

    @php
    $filmes = [
    ['https://image.tmdb.org/t/p/w500/56v2KjBlU4XaOv9rVYEQypROD7P.jpg','Stranger Things'],
    ['/img/derepente30.jpg','De Repente 30'],
    ['https://image.tmdb.org/t/p/w500/7WsyChQLEftFiDOVTGkv3hFpyyt.jpg','Vingadores: Ultimato'],
    ['/img/barbie.jpg','Barbie Escola de Princesas'],
    ['https://image.tmdb.org/t/p/w500/q719jXXEzOoYaps6babgKnONONX.jpg','Your Name']
    ];
    @endphp

    @foreach($filmes as $filme)

    <div
    class="group cursor-pointer overflow-hidden rounded-xl bg-zinc-900 shadow-xl">

        <img
        src="{{ $filme[0] }}"
        class="w-full h-[330px] object-cover group-hover:scale-110 transition duration-500">

        <div class="p-4">
            <h3 class="font-semibold text-center">
                {{ $filme[1] }}
            </h3>
        </div>

    </div>

    @endforeach

</div>
```

</section>

<section class="px-10 py-8">

```
<h2 class="text-3xl font-bold mb-6">
    📺 Séries em Alta
</h2>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">

    @php
    $series = [
    ['/img/shadowhunters.jpg','Shadowhunters'],
    ['https://image.tmdb.org/t/p/w500/reEMJA1uzscCbkpeRJeTT2bjqUp.jpg','La Casa de Papel'],
    ['https://image.tmdb.org/t/p/w500/9OYu6oDLIidSOocW3JTGtd2Oyqy.jpg','The Good Doctor'],
    ['/img/manifest.jpg','Manifest'],
    ['https://image.tmdb.org/t/p/w500/62HCnUTziyWcpDaBO2i1DX17ljH.jpg','Top Gun Maverick']
    ];
    @endphp

    @foreach($series as $serie)

    <div
    class="group cursor-pointer overflow-hidden rounded-xl bg-zinc-900 shadow-xl">

        <img
        src="{{ $serie[0] }}"
        class="w-full h-[330px] object-cover group-hover:scale-110 transition duration-500">

        <div class="p-4">
            <h3 class="font-semibold text-center">
                {{ $serie[1] }}
            </h3>
        </div>

    </div>

    @endforeach

</div>
```

</section>

@endsection
