<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\UsuarioController;

// ===== LOGIN =====

Route::get('/', [LoginController::class, 'index'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// ===== ÁREA PROTEGIDA (precisa estar logado) =====

Route::middleware('auth')->group(function () {

    // filmes
    Route::get('/filmes',                [FilmeController::class, 'index'])->name('filmes.index');
    Route::post('/filmes',               [FilmeController::class, 'store'])->name('filmes.store');
    Route::get('/filmes/{id}/editar',    [FilmeController::class, 'edit'])->name('filmes.edit');
    Route::put('/filmes/{id}',           [FilmeController::class, 'update'])->name('filmes.update');
    Route::delete('/filmes/{id}',        [FilmeController::class, 'destroy'])->name('filmes.destroy');

    // series
    Route::get('/series',                [SerieController::class, 'index'])->name('series.index');
    Route::post('/series',               [SerieController::class, 'store'])->name('series.store');
    Route::get('/series/{id}/editar',    [SerieController::class, 'edit'])->name('series.edit');
    Route::put('/series/{id}',           [SerieController::class, 'update'])->name('series.update');
    Route::delete('/series/{id}',        [SerieController::class, 'destroy'])->name('series.destroy');

    // usuarios
    Route::get('/usuarios',              [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios',             [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{id}/editar',  [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}',         [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}',      [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

});
