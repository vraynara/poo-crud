@extends('layouts.app')

@section('titulo', 'Filmes')

@section('conteudo')

<h2>Cadastro de Filmes</h2>

<form
    method="POST"
    action="{{ $editando ? route('filmes.update', $filme->id) : route('filmes.store') }}"
    class="crud-form">

    @csrf

    @if($editando)
        @method('PUT')
        <input type="hidden" name="id" value="{{ $filme->id }}">
    @endif

    <input
        type="text"
        name="nome"
        placeholder="Nome do Filme"
        value="{{ $editando ? $filme->nome : old('nome') }}"
        required>

    <input
        type="text"
        name="categoria"
        placeholder="Categoria (ex: Ação, Drama, Comédia)"
        value="{{ $editando ? $filme->categoria : old('categoria') }}"
        required>

    <input
        type="number"
        name="ano"
        placeholder="Ano de Lançamento"
        min="1900"
        max="2099"
        value="{{ $editando ? $filme->ano : old('ano') }}"
        required>

    <div class="buttons">

        <button type="submit">
            {{ $editando ? 'Atualizar' : 'Cadastrar' }}
        </button>

        @if($editando)
            <a href="{{ route('filmes.index') }}" class="btn-cancelar">
                Cancelar
            </a>
        @endif

    </div>

</form>

<table>

    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Ano</th>
        <th>Ações</th>
    </tr>

    @foreach($filmes as $item)

    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->nome }}</td>
        <td>{{ $item->categoria }}</td>
        <td>{{ $item->ano }}</td>
        <td>

            <a href="{{ route('filmes.edit', $item->id) }}">Editar</a>

            |

            <a
                href="{{ route('filmes.destroy', $item->id) }}"
                onclick="return confirm('Tem certeza que deseja excluir?')"
                data-method="delete">
                Excluir
            </a>

            <form
                id="delete-{{ $item->id }}"
                action="{{ route('filmes.destroy', $item->id) }}"
                method="POST"
                style="display:none">
                @csrf
                @method('DELETE')
            </form>

        </td>
    </tr>

    @endforeach

    @if($filmes->isEmpty())
    <tr>
        <td colspan="5">Nenhum filme cadastrado ainda.</td>
    </tr>
    @endif

</table>

<script>
document.querySelectorAll('[data-method="delete"]').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('Tem certeza que deseja excluir?')) {
            const id = this.href.split('/').pop();
            document.getElementById('delete-' + id).submit();
        }
    });
});
</script>

@endsection
