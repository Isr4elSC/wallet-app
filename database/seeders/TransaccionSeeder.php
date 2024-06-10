<?php

namespace Database\Seeders;

use App\Models\Transaccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Monedero;
use App\Models\Comercio;


class TransaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Obtener todos los usuarios y comercios
        $monederos = Monedero::all();
        $comercios = Comercio::all();

        // Verificar que hay usuarios y comercios en la base de datos
        if ($monederos->isEmpty() || $comercios->isEmpty()) {
            $this->command->info('No hay usuarios o comercios disponibles.');
            return;
        }

        // Crear transacciones para cada usuario
        foreach ($monederos as $monedero) {
            // Seleccionar un comercio aleatorio
            $comercio = $comercios->random();

            // Crear una transacción
            Transaccion::create([
                'monedero_id' => $monedero->id,
                'comercio_id' => $comercio->id,
                'fecha_transaccion' => now(), // Fecha actual
                'cantidad' => rand(5, 50),
                'concepto' => 'Compra en ' . $comercio->nombre,
                'tipo_transaccion' => 'Compra',
                'estado' => 'Pendiente', // Estado pendiente
            ]);
        }
        Transaccion::factory(10)->create();
    }
}
