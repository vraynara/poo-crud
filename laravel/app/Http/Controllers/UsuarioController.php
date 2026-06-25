<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'desc')->get();
        $editando = false;
        $usuario  = null;

        return view('usuarios.index', compact('usuarios', 'editando', 'usuario'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'  => 'required|max:100',
            'email' => 'required|email|unique:usuarios,email|max:150',
            'plano' => 'required|in:Básico,Standard,Premium',
        ], [
            'nome.required'   => 'O nome é obrigatório.',
            'email.required'  => 'O email é obrigatório.',
            'email.email'     => 'Digite um email válido.',
            'email.unique'    => 'Esse email já está cadastrado.',
            'plano.required'  => 'Escolha um plano.',
            'plano.in'        => 'Plano inválido.',
        ]);

        Usuario::create($request->only('nome', 'email', 'plano'));

        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $usuarios = Usuario::orderBy('id', 'desc')->get();
        $usuario  = Usuario::findOrFail($id);
        $editando = true;

        return view('usuarios.index', compact('usuarios', 'editando', 'usuario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'  => 'required|max:100',
            'email' => 'required|email|unique:usuarios,email,' . $id . '|max:150',
            'plano' => 'required|in:Básico,Standard,Premium',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->only('nome', 'email', 'plano'));

        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário excluído com sucesso!');
    }
}
