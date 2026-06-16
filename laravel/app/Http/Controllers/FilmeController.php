<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function index()
    {
        $filmes = Filme::orderBy('id', 'desc')->get();

        return view('filmes', compact('filmes'));
    }

    public function store(Request $request)
    {
        Filme::create($request->all());

        return redirect('/filmes');
    }

    public function destroy(int $id)
    {
        Filme::destroy($id);

        return redirect('/filmes');
    }

    public function edit(int $id)
    {
        $filme = Filme::findOrFail($id);

        $filmes = Filme::orderBy('id', 'desc')->get();

        return view('filmes', compact('filme', 'filmes'));
    }

    public function update(Request $request,int $id)
    {
        $filme = Filme::findOrFail($id);

        $filme->update($request->all());

        return redirect('/filmes');
    }
}