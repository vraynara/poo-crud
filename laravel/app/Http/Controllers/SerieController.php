<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SerieController extends Controller
{
    public function index()
    {
        $series   = Serie::orderBy('id', 'desc')->get();
        $editando = false;
        $serie    = null;

        return view('series.index', compact('series', 'editando', 'serie'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'       => 'required|max:100',
            'temporadas' => 'required|integer|min:1',
            'genero'     => 'required|max:100',
        ], [
            'nome.required'       => 'O nome da série é obrigatório.',
            'temporadas.required' => 'O número de temporadas é obrigatório.',
            'temporadas.integer'  => 'Temporadas precisa ser um número.',
            'genero.required'     => 'O gênero é obrigatório.',
        ]);

        Serie::create($request->only('nome', 'temporadas', 'genero'));

        return redirect()->route('series.index')->with('sucesso', 'Série cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $series   = Serie::orderBy('id', 'desc')->get();
        $serie    = Serie::findOrFail($id);
        $editando = true;

        return view('series.index', compact('series', 'editando', 'serie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'       => 'required|max:100',
            'temporadas' => 'required|integer|min:1',
            'genero'     => 'required|max:100',
        ]);

        $serie = Serie::findOrFail($id);
        $serie->update($request->only('nome', 'temporadas', 'genero'));

        return redirect()->route('series.index')->with('sucesso', 'Série atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $serie = Serie::findOrFail($id);
        $serie->delete();

        return redirect()->route('series.index')->with('sucesso', 'Série excluída com sucesso!');
    }
}
