<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experiencia>
 */
class ExperienciaFactory extends Factory
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
            'descripcion' => $this->faker->sentence($nbWords = 100, $variableNbWords = true),
            //'imagen_experiencia' => $this->faker->randomElement(['boxeo.jpg','billetes.jpg','grafica.jpg','monedas.jpg', 'bambas.jpg','atleta.jpg']),
            'fecha_publicacion' => date('y/m/d'),
            'juguete_id' => $this->faker->numberBetween($min = 1, $max = 100),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 1), 
            'valoracion' =>  $this->faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
        ];
    }
}
