<?php

namespace Database\Factories;

use App\Models\Comercio;
use App\Models\Monedero;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransaccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'monedero_id' => Monedero::all()->random()->id,
            'comercio_id' => Comercio::all()->random()->id,
            'fecha_transaccion' => $this->faker->date(),
            'cantidad' => $this->faker->randomFloat(2, 0, 100),
            'concepto' => $this->faker->text(40),
            'tipo_transaccion' => "Compra",
            'estado' => "Pendiente"
        ];
    }
}
