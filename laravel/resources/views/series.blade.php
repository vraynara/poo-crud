@extends('layouts.app')

@section('content')

<div class="w-[90%] mx-auto mt-10 bg-[#1f1f1f] p-8 rounded-xl">

    <h2 class="text-red-600 text-4xl font-bold mb-6">
        Séries
    </h2>

    <form class="grid gap-4 mb-8">

        <input
            type="text"
            placeholder="Nome da Série"
            class="p-3 rounded text-black">

        <input
            type="number"
            placeholder="Temporadas"
            class="p-3 rounded text-black">

        <input
            type="text"
            placeholder="Gênero"
            class="p-3 rounded text-black">

        <div class="flex gap-3">

            <button
                class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded">
                Salvar
            </button>

            <button
                type="reset"
                class="bg-zinc-700 hover:bg-zinc-600 px-6 py-3 rounded">
                Limpar
            </button>

        </div>

    </form>

    <table class="w-full">

        <thead>

            <tr class="bg-red-600">

                <th class="p-4">ID</th>
                <th class="p-4">Nome</th>
                <th class="p-4">Temporadas</th>
                <th class="p-4">Gênero</th>
                <th class="p-4">Ações</th>

            </tr>

        </thead>

        <tbody>

            <tr class="bg-[#2b2b2b]">

                <td class="p-4 text-center">1</td>
                <td class="p-4 text-center">Dark</td>
                <td class="p-4 text-center">3</td>
                <td class="p-4 text-center">Mistério</td>

                <td class="p-4 text-center">

                    <a href="#" class="text-yellow-400">
                        Editar
                    </a>

                    |

                    <a href="#" class="text-red-500">
                        Excluir
                    </a>

                </td>

            </tr>

        </tbody>

    </table>

</div>

@endsection