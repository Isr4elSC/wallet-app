<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Monedero>
 */
class MonederoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $valor = 100.00;
        $usuario = User::all()->random()->assignRole('Comercio');
        return [
            //
            'user_id' => $usuario,
            'saldo' => $valor,
        ];
    }
}
