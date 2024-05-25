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
            'nombre_comercio' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'categoria' => $this->faker->word(),
            'direccion' => $this->faker->address(),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'logo' => $this->faker->imageUrl(),
            'pagina_web' => $this->faker->url(),
            'calificacion' => $this->faker->randomFloat(2, 0, 10),
            'saldo_disponible' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
