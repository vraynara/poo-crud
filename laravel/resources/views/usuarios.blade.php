@extends('layouts.app')

@section('content')

<div class="w-[90%] mx-auto mt-10 bg-[#1f1f1f] p-8 rounded-xl">

    <h2 class="text-red-600 text-4xl font-bold mb-6">
        Cadastro de Usuários
    </h2>

    <form
        method="POST"
        action="{{ isset($usuario) ? url('/usuarios/'.$usuario->id) : url('/usuarios') }}"
        class="grid gap-4">

        @csrf

        @if(isset($usuario))
            @method('PUT')
        @endif

        <input
            type="text"
            name="nome"
            placeholder="Nome"
            value="{{ $usuario->nome ?? '' }}"
            class="p-3 rounded text-black"
            required>

        <input
            type="email"
            name="email"
            placeholder="Email"
            value="{{ $usuario->email ?? '' }}"
            class="p-3 rounded text-black"
            required>

        @if(!isset($usuario))
        <input
            type="password"
            name="senha"
            placeholder="Senha"
            class="p-3 rounded text-black"
            required>
        @endif

        <input
            type="text"
            name="plano"
            placeholder="Plano"
            value="{{ $usuario->plano ?? '' }}"
            class="p-3 rounded text-black"
            required>

        <button
            class="bg-red-600 hover:bg-red-700 p-3 rounded">

            {{ isset($usuario) ? 'Atualizar' : 'Cadastrar' }}

        </button>

    </form>

    <table class="w-full mt-8">

        <thead>

            <tr class="bg-red-600">

                <th class="p-4">ID</th>
                <th class="p-4">Nome</th>
                <th class="p-4">Email</th>
                <th class="p-4">Plano</th>
                <th class="p-4">Ações</th>

            </tr>

        </thead>

        <tbody>

        @foreach($usuarios as $usuario)

            <tr class="bg-[#2b2b2b] border-b border-zinc-700">

                <td class="p-4 text-center">
                    {{ $usuario->id }}
                </td>

                <td class="p-4 text-center">
                    {{ $usuario->nome }}
                </td>

                <td class="p-4 text-center">
                    {{ $usuario->email }}
                </td>

                <td class="p-4 text-center">
                    {{ $usuario->plano }}
                </td>

                <td class="p-4 text-center">

                    <a
                        href="/usuarios/{{ $usuario->id }}/editar"
                        class="text-yellow-400">
                        Editar
                    </a>

                    |

                    <form
                        action="/usuarios/{{ $usuario->id }}"
                        method="POST"
                        class="inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Excluir usuário?')"
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