<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Juguete>
 */
class JugueteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'titulo' => $this->faker->sentence($nbWords = 8, $variableNbWords = true),  // 'Sit vitae voluptas sint non voluptates.'
            'descripcion' => $this->faker->sentence($nbWords = 200, true),
            'precio' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 1000), // 48.8932
            'num_votaciones' => $this->faker->numberBetween($min = 1000, $max = 9000), // 8567
            'puntuacion' =>  $this->faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            'edad' => $this->faker->numberBetween($min = 0, $max = 8),
            
            'pro1' => $this->faker->boolean(),
            'pro2' => $this->faker->boolean(),
            'pro3' => $this->faker->boolean(),
            'pro4' => $this->faker->boolean(),
            'pro5' => $this->faker->boolean(),
            'pro6' => $this->faker->boolean(),

            'contra1' => $this->faker->boolean(),
            'contra2' => $this->faker->boolean(),

            'contra3' => $this->faker->boolean(),
            'contra4' => $this->faker->boolean(),
            'contra5' => $this->faker->boolean(),
            'contra6' => $this->faker->boolean(),

            'marca' => $this->faker->randomElement(['KidKraft', 'Barbie', 'Lego', 'Playmobil', 'Mattel']),
            'material' => $this->faker->randomElement(['Hierro', 'Madera', 'Plástico']),

            'ancho' =>$this->faker->randomElement(['11','39','55','13','51']),
            'largo' =>$this->faker->randomElement(['10','22','82','4','57']),
            'alto' =>$this->faker->randomElement(['15','90','81','2','43']),

            'path_imagen' => $this->faker->randomElement(['1','2','3','4','5','6','7','8','9','10','11','12']),

            'path_video1' => $this->faker->randomElement(['1n2CgSJKbyI','U_MjcqKWPU0','I-x8y7xjE3A']),
            'path_video2' => $this->faker->randomElement(['1n2CgSJKbyI','U_MjcqKWPU0','I-x8y7xjE3A']),
            'path_video3' => $this->faker->randomElement(['1n2CgSJKbyI','U_MjcqKWPU0','I-x8y7xjE3A']),

            /*
            'imagen1' => $this->faker->randomElement(['boxeo.jpg','billetes.jpg','grafica.jpg','monedas.jpg', 'bambas.jpg','atleta.jpg']),
            'imagen2' => $this->faker->randomElement(['boxeo.jpg','billetes.jpg','grafica.jpg','monedas.jpg', 'bambas.jpg','atleta.jpg']),
            'imagen3' => $this->faker->randomElement(['boxeo.jpg','billetes.jpg','grafica.jpg','monedas.jpg', 'bambas.jpg','atleta.jpg']),
            'imagen4' => $this->faker->randomElement(['boxeo.jpg','billetes.jpg','grafica.jpg','monedas.jpg', 'bambas.jpg','atleta.jpg']),
            'imagen5' => $this->faker->randomElement(['boxeo.jpg','billetes.jpg','grafica.jpg','monedas.jpg', 'bambas.jpg','atleta.jpg']),
            'imagen6' => $this->faker->randomElement(['boxeo.jpg','billetes.jpg','grafica.jpg','monedas.jpg', 'bambas.jpg','atleta.jpg']),
            'imagen7' => $this->faker->randomElement(['boxeo.jpg','billetes.jpg','grafica.jpg','monedas.jpg', 'bambas.jpg','atleta.jpg']),
            'imagen8' => $this->faker->randomElement(['boxeo.jpg','billetes.jpg','grafica.jpg','monedas.jpg', 'bambas.jpg','atleta.jpg']),
            */
            
            'fecha_publicacion' => date('y/m/d'),
            'categoria_id' => $this->faker->numberBetween($min = 1, $max = 12), 
            
        ];
    }
}
