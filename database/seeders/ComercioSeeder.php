<?php

namespace Database\Seeders;

use App\Models\Comercio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ComercioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = User::all();
        //
        foreach ($usuarios as $usuario) {
            if (rand(0, 1) == 1)
                Comercio::factory()->create([
                    'user_id' => $usuario->id,
                ]);
        }
    }
}
