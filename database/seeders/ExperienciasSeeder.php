<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Activamos los factories desde el seeder
        \App\Models\Experiencia::factory(50)->create();
        /*
        //Llenamos la tabla pivot categoria_juguete
        foreach (\App\Models\Experiencia::all() as $experiencia) {

            //de la tabla categorias la ordenamos aleatoriamnete y cogemos de 1 a 3 categorias solo con el campo id
            $idJugueteDeLaExperiencia = \App\Models\Juguete::inRandomOrder()->take(1)->pluck('id');

            //Asignamos de 1 a 3 categorias para cada noticia.
            //A través de la función 'categorias' del modelo Juguete que creamos.
            //$experiencia->juguetes()->attach($idJugueteDeLaExperiencia);
            $experiencia->juguete_id = $idJugueteDeLaExperiencia;

        }
        */

    }
}
