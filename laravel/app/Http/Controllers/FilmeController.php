<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;

class FilmeController extends Controller
{
    public function index()
    {
        $filmes   = Filme::orderBy('id', 'desc')->get();
        $editando = false;
        $filme    = null;

        return view('filmes.index', compact('filmes', 'editando', 'filme'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'      => 'required|max:100',
            'categoria' => 'required|max:100',
            'ano'       => 'required|integer|min:1900|max:2099',
        ], [
            'nome.required'      => 'O nome do filme é obrigatório.',
            'categoria.required' => 'A categoria é obrigatória.',
            'ano.required'       => 'O ano é obrigatório.',
            'ano.integer'        => 'O ano precisa ser um número.',
        ]);

        Filme::create($request->only('nome', 'categoria', 'ano'));

        return redirect()->route('filmes.index')->with('sucesso', 'Filme cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $filmes   = Filme::orderBy('id', 'desc')->get();
        $filme    = Filme::findOrFail($id);
        $editando = true;

        return view('filmes.index', compact('filmes', 'editando', 'filme'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'      => 'required|max:100',
            'categoria' => 'required|max:100',
            'ano'       => 'required|integer|min:1900|max:2099',
        ]);

        $filme = Filme::findOrFail($id);
        $filme->update($request->only('nome', 'categoria', 'ano'));

        return redirect()->route('filmes.index')->with('sucesso', 'Filme atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $filme = Filme::findOrFail($id);
        $filme->delete();

        return redirect()->route('filmes.index')->with('sucesso', 'Filme excluído com sucesso!');
    }
}
