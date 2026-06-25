<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // usuário de login padrão
        DB::table('users')->insert([
            'name'       => 'Admin',
            'email'      => 'admin@netflix.com',
            'password'   => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // filmes de exemplo
        DB::table('filmes')->insert([
            ['nome' => 'Stranger Things', 'categoria' => 'Ficção Científica', 'ano' => 2016, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'La Casa de Papel', 'categoria' => 'Drama',            'ano' => 2017, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Dark',             'categoria' => 'Mistério',          'ano' => 2017, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // series de exemplo
        DB::table('series')->insert([
            ['nome' => 'Breaking Bad', 'temporadas' => 5, 'genero' => 'Drama',   'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'The Witcher',  'temporadas' => 3, 'genero' => 'Fantasia', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Narcos',       'temporadas' => 3, 'genero' => 'Crime',    'created_at' => now(), 'updated_at' => now()],
        ]);

        // usuarios de exemplo
        DB::table('usuarios')->insert([
            ['nome' => 'João Silva',   'email' => 'joao@email.com',  'plano' => 'Premium',  'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Maria Santos', 'email' => 'maria@email.com', 'plano' => 'Básico',   'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Pedro Lima',   'email' => 'pedro@email.com', 'plano' => 'Standard', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
