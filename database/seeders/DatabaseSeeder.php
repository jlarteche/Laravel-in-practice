<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        //$this->call(CursoSeeder::class); //totalmente válido, pero al final se hace esto:
        Curso::factory(50)->create(); //lo sugerido por el comentario inicial, creando la factory primero.
    }
}
