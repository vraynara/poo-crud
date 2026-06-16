<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function autenticar(Request $request)
    {
        $usuario = DB::table('login')
            ->where('email', $request->email)
            ->first();

        if ($usuario && $usuario->senha === $request->senha) {

            session([
                'usuario_logado' => $usuario->email
            ]);

            return redirect('/');
        }

        return back()->with('erro', 'Email ou senha inválidos');
    }

    public function sair()
    {
        session()->forget('usuario_logado');

        return redirect('/login');
    }
}