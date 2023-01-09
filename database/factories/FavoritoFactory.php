<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Favorito>
 */
class FavoritoFactory extends Factory
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
            'fecha_favorito' => date('y/m/d'),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 100), 
            'juguete_id' => $this->faker->numberBetween($min = 1, $max = 100), 
        ];
    }
}
