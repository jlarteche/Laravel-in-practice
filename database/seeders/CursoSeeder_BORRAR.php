<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*  $curso = new Curso();
        $curso->name = 'LaravelCurso';
        $curso->description = 'Curso de Laravel';
        $curso->categoria = 'Desarrollo web';
        $curso->save();

        $curso2 = new Curso();
        $curso2->name = 'LaravelCurso2';
        $curso2->description = 'Curso de Laravel2';
        $curso2->categoria = 'Desarrollo web2';
        $curso2->save(); */
        
        Curso::factory(50)->create();
    }
}
