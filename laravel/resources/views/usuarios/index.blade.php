@extends('layouts.app')

@section('titulo', 'Usuários')

@section('conteudo')

<h2>Cadastro de Usuários</h2>

<form
    method="POST"
    action="{{ $editando ? route('usuarios.update', $usuario->id) : route('usuarios.store') }}"
    class="crud-form">

    @csrf

    @if($editando)
        @method('PUT')
        <input type="hidden" name="id" value="{{ $usuario->id }}">
    @endif

    <input
        type="text"
        name="nome"
        placeholder="Nome Completo"
        value="{{ $editando ? $usuario->nome : old('nome') }}"
        required>

    <input
        type="email"
        name="email"
        placeholder="Email"
        value="{{ $editando ? $usuario->email : old('email') }}"
        required>

    <select name="plano" required>
        <option value="" disabled {{ $editando ? '' : 'selected' }}>Selecione o Plano</option>
        <option value="Básico"    {{ ($editando && $usuario->plano == 'Básico')    ? 'selected' : '' }}>Básico</option>
        <option value="Standard"  {{ ($editando && $usuario->plano == 'Standard')  ? 'selected' : '' }}>Standard</option>
        <option value="Premium"   {{ ($editando && $usuario->plano == 'Premium')   ? 'selected' : '' }}>Premium</option>
    </select>

    <div class="buttons">

        <button type="submit">
            {{ $editando ? 'Atualizar' : 'Cadastrar' }}
        </button>

        @if($editando)
            <a href="{{ route('usuarios.index') }}" class="btn-cancelar">
                Cancelar
            </a>
        @endif

    </div>

</form>

<table>

    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Plano</th>
        <th>Ações</th>
    </tr>

    @foreach($usuarios as $item)

    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->nome }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->plano }}</td>
        <td>

            <a href="{{ route('usuarios.edit', $item->id) }}">Editar</a>

            |

            <a
                href="#"
                data-method="delete"
                data-id="{{ $item->id }}">
                Excluir
            </a>

            <form
                id="delete-{{ $item->id }}"
                action="{{ route('usuarios.destroy', $item->id) }}"
                method="POST"
                style="display:none">
                @csrf
                @method('DELETE')
            </form>

        </td>
    </tr>

    @endforeach

    @if($usuarios->isEmpty())
    <tr>
        <td colspan="5">Nenhum usuário cadastrado ainda.</td>
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
