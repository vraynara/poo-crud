<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    if (!session()->has('usuario_logado')) {
        return redirect('/login');
    }

    return view('home');

});

/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'autenticar']);
Route::get('/sair', [LoginController::class, 'sair']);

/*
|--------------------------------------------------------------------------
| Filmes
|--------------------------------------------------------------------------
*/

Route::get('/filmes', [FilmeController::class, 'index']);
Route::post('/filmes', [FilmeController::class, 'store']);
Route::get('/filmes/{id}/editar', [FilmeController::class, 'edit']);
Route::put('/filmes/{id}', [FilmeController::class, 'update']);
Route::delete('/filmes/{id}', [FilmeController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Séries
|--------------------------------------------------------------------------
*/

Route::get('/series', [SerieController::class, 'index']);
Route::post('/series', [SerieController::class, 'store']);
Route::get('/series/{id}/editar', [SerieController::class, 'edit']);
Route::put('/series/{id}', [SerieController::class, 'update']);
Route::delete('/series/{id}', [SerieController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Usuários
|--------------------------------------------------------------------------
*/

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::get('/usuarios/{id}/editar', [UsuarioController::class, 'edit']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);