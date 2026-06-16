@extends('layouts.app')

@section('content')

<div class="w-[90%] mx-auto mt-10 bg-[#1f1f1f] p-8 rounded-xl">

    <h2 class="text-red-600 text-4xl font-bold mb-6">
        Cadastro de Filmes
    </h2>

    <form
        method="POST"
        action="{{ isset($filme) ? url('/filmes/'.$filme->id) : url('/filmes') }}"
        class="grid gap-4">

        @csrf

        @if(isset($filme))
            @method('PUT')
        @endif

        <input
            type="text"
            name="nome"
            placeholder="Nome do Filme"
            value="{{ $filme->nome ?? '' }}"
            class="p-3 rounded text-black">

        <input
            type="text"
            name="categoria"
            placeholder="Categoria"
            value="{{ $filme->categoria ?? '' }}"
            class="p-3 rounded text-black">

        <input
            type="number"
            name="ano"
            placeholder="Ano"
            value="{{ $filme->ano ?? '' }}"
            class="p-3 rounded text-black">

        <button
            class="bg-red-600 hover:bg-red-700 p-3 rounded">

            {{ isset($filme) ? 'Atualizar' : 'Cadastrar' }}

        </button>

    </form>

    <table class="w-full mt-8">

        <thead>

            <tr class="bg-red-600">

                <th class="p-4">ID</th>
                <th class="p-4">Nome</th>
                <th class="p-4">Categoria</th>
                <th class="p-4">Ano</th>
                <th class="p-4">Ações</th>

            </tr>

        </thead>

        <tbody>

        @foreach($filmes as $filme)

            <tr class="bg-[#2b2b2b]">

                <td class="p-4 text-center">
                    {{ $filme->id }}
                </td>

                <td class="p-4 text-center">
                    {{ $filme->nome }}
                </td>

                <td class="p-4 text-center">
                    {{ $filme->categoria }}
                </td>

                <td class="p-4 text-center">
                    {{ $filme->ano }}
                </td>

                <td class="p-4 text-center">

                    <a
                        href="/filmes/{{ $filme->id }}/editar"
                        class="text-yellow-400">
                        Editar
                    </a>

                    |

                    <form
                        action="/filmes/{{ $filme->id }}"
                        method="POST"
                        class="inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Excluir filme?')"
                            class="text-red-500">

                            Excluir

                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection