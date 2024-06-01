<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comercio>
 */
class ComercioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id, // Selecciona un usuario aleatorio (id
            'nombre' => $this->faker->name(),
            // 'nif' => $this->faker->unique()->text(9),
            // // 'categoria' => $this->faker->word(),
            // 'direccion' => $this->faker->address(),
            // 'telefono' => $this->faker->phoneNumber(),
            // 'email' => $this->faker->unique()->safeEmail(),
            // 'logo' => $this->faker->imageUrl(),
            // 'web' => $this->faker->url(),
            // 'calificacion' => $this->faker->randomFloat(2, 0, 10),
            'saldo' => 0,
        ];
    }
}
