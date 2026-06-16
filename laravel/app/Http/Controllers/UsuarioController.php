<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id','desc')->get();

        return view('usuarios', compact('usuarios'));
    }

    public function store(Request $request)
    {
        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
            'plano' => $request->plano
        ]);

        return redirect('/usuarios');
    }

    public function edit(int $id)
    {
        $usuario = Usuario::findOrFail($id);

        $usuarios = Usuario::orderBy('id','desc')->get();

        return view('usuarios', compact('usuario','usuarios'));
    }

    public function update(Request $request,int $id)
    {
        $usuario = Usuario::findOrFail($id);

        $usuario->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'plano' => $request->plano
        ]);

        return redirect('/usuarios');
    }

    public function destroy(int $id)
    {
        Usuario::destroy($id);

        return redirect('/usuarios');
    }
}