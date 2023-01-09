<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function run() {

        // 1
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Juegos imitación',
            'subcategoria1' => 'Mecánico',
            'subcategoria2' => 'Banco Trabajo',
            'imagen_categoria' => 'oficios.png',
            'imagen_subcat1' => 'mecanico.png',
            'imagen_subcat2' => 'taller-mecanico.png',
        ]);

        // 2
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Juegos imitación',
            'subcategoria1' => 'Mecánico',
            'subcategoria2' => 'Herramientas',
            'imagen_categoria' => 'oficios.png',
            'imagen_subcat1' => 'mecanico.png',
            'imagen_subcat2' => 'herramientas.png',
        ]);

        // 3
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Juegos imitación',
            'subcategoria1' => 'Cocinero',
            'subcategoria2' => 'Cocinas',
            'imagen_categoria' => 'oficios.png',
            'imagen_subcat1' => 'cocinero.png',
            'imagen_subcat2' => 'cocinas.png',
        ]);
        
        // 4
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Juegos imitación',
            'subcategoria1' => 'Cocinero',
            'subcategoria2' => 'Baterías de ollas',
            'imagen_categoria' => 'oficios.png',
            'imagen_subcat1' => 'cocinero.png',
            'imagen_subcat2' => 'ollas.png',
        ]);

        // 5 
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Juegos imitación',
            'subcategoria1' => 'Cocinero',
            'subcategoria2' => 'Alimentos',
            'imagen_categoria' => 'oficios.png',
            'imagen_subcat1' => 'cocinero.png',
            'imagen_subcat2' => 'alimentos.png',
            
        ]);

        // 6
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Juegos imitación',
            'subcategoria1' => 'Médicos',
            'subcategoria2' => 'Centro médico',
            'imagen_categoria' => 'oficios.png',
            'imagen_subcat1' => 'medico.png',
            'imagen_subcat2' => 'centro-medico.png',
        ]);

        // 7
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Juegos imitación',
            'subcategoria1' => 'Médicos',
            'subcategoria2' => 'Maletines',
            'imagen_categoria' => 'oficios.png',
            'imagen_subcat1' => 'medico.png',
            'imagen_subcat2' => 'maletines.png',
        ]);

        // 8
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Niñer@s',
            'subcategoria1' => 'Casa de muñecas',
            'subcategoria2' => 'Accesorios',
            'imagen_categoria' => 'ninyera.png',
            'imagen_subcat1' => 'casa-munyecas.png',
            'imagen_subcat2' => 'accesorios-casa-munyecas.png',
        ]);

        // 9
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Niñer@s',
            'subcategoria1' => 'Casa de muñecas',
            'subcategoria2' => 'Madera',
            'imagen_categoria' => 'ninyera.png',
            'imagen_subcat1' => 'casa-munyecas.png',
            'imagen_subcat2' => 'madera.png',
        ]);

        // 10
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Niñer@s',
            'subcategoria1' => 'Casa de muñecas',
            'subcategoria2' => 'Plástico',
            'imagen_categoria' => 'ninyera.png',
            'imagen_subcat1' => 'casa-munyecas.png',
            'imagen_subcat2' => 'plastico.png',
        ]);

        //11
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Niñer@s',
            'subcategoria1' => 'Muñecas',
            'subcategoria2' => 'Trapo',
            'imagen_categoria' => 'ninyera.png',
            'imagen_subcat1' => 'munyecas.png',
            'imagen_subcat2' => 'munyecas-trapo.png',
        ]);

        // 12
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Niñer@s',
            'subcategoria1' => 'Muñecas',
            'subcategoria2' => 'Bebés',
            'imagen_categoria' => 'ninyera.png',
            'imagen_subcat1' => 'munyecas.png',
            'imagen_subcat2' => 'bebes.png',
        ]);




    }
}
