@extends('layouts.app')

@section('titulo', 'Séries')

@section('conteudo')

<h2>Cadastro de Séries</h2>

<form
    method="POST"
    action="{{ $editando ? route('series.update', $serie->id) : route('series.store') }}"
    class="crud-form">

    @csrf

    @if($editando)
        @method('PUT')
        <input type="hidden" name="id" value="{{ $serie->id }}">
    @endif

    <input
        type="text"
        name="nome"
        placeholder="Nome da Série"
        value="{{ $editando ? $serie->nome : old('nome') }}"
        required>

    <input
        type="number"
        name="temporadas"
        placeholder="Número de Temporadas"
        min="1"
        value="{{ $editando ? $serie->temporadas : old('temporadas') }}"
        required>

    <input
        type="text"
        name="genero"
        placeholder="Gênero (ex: Drama, Thriller, Comédia)"
        value="{{ $editando ? $serie->genero : old('genero') }}"
        required>

    <div class="buttons">

        <button type="submit">
            {{ $editando ? 'Atualizar' : 'Cadastrar' }}
        </button>

        @if($editando)
            <a href="{{ route('series.index') }}" class="btn-cancelar">
                Cancelar
            </a>
        @endif

    </div>

</form>

<table>

    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Temporadas</th>
        <th>Gênero</th>
        <th>Ações</th>
    </tr>

    @foreach($series as $item)

    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->nome }}</td>
        <td>{{ $item->temporadas }}</td>
        <td>{{ $item->genero }}</td>
        <td>

            <a href="{{ route('series.edit', $item->id) }}">Editar</a>

            |

            <a
                href="#"
                data-method="delete"
                data-id="{{ $item->id }}">
                Excluir
            </a>

            <form
                id="delete-{{ $item->id }}"
                action="{{ route('series.destroy', $item->id) }}"
                method="POST"
                style="display:none">
                @csrf
                @method('DELETE')
            </form>

        </td>
    </tr>

    @endforeach

    @if($series->isEmpty())
    <tr>
        <td colspan="5">Nenhuma série cadastrada ainda.</td>
    </tr>
    @endif

</table>

<script>
document.querySelectorAll('[data-method="delete"]').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('Tem certeza que deseja excluir?')) {
            const id = this.dataset.id;
            document.getElementById('delete-' + id).submit();
        }
    });
});
</script>

@endsection
