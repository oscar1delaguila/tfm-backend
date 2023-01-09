<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JuguetesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Activamos los factories desde el seeder
      
        \App\Models\Juguete::factory(100)->create();

        //Llenamos la tabla pivot categoria_juguete
        /*
        foreach (\App\Models\Juguete::all() as $juguete) {

            //de la tabla categorias la ordenamos aleatoriamnete y cogemos de 1 a 3 categorias solo con el campo id
            $categoriaId = \App\Models\Categoria::inRandomOrder()->take(1)->pluck('id');

            //Asignamos de 1 a 3 categorias para cada noticia.
            //A través de la función 'categorias' del modelo Juguete que creamos.
            //$juguete->categorias()->attach($categorias);
            $juguete->categoria_id = $categoriaId;

        }
        */
        

        //Llenamos la tabla pivot categoria_juguete
        /*foreach (\App\Models\Juguete::all() as $juguete) {

            //de la tabla categorias la ordenamos aleatoriamnete y cogemos de 1 a 3 categorias solo con el campo id
            $experiencias = \App\Models\Experiencia::inRandomOrder()->take(rand(1,4))->pluck('id');

            //Asignamos de 1 a 3 categorias para cada noticia.
            //A través de la función 'categorias' del modelo Juguete que creamos.
            $juguete->experiencias()->attach($experiencias);

        }
        */

    }
}
