<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Usuario::factory()->create([
            'nombre' => 'Gian Garcia',
            'email' => 'gian09@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        Usuario::factory()->create([
            'nombre' => 'Juan Perez',
            'email' => 'juan@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        // Usuario::factory()->create([
        //     'nombre' => 'Maria Lopez',
        //     'email' => 'marial@gmail.com',
        //     'contrasena' => Hash::make('12345678'),
        // ]);

        // Usuario::factory()->create([
        //     'nombre' => 'Carlos Ramirez',
        //     'email' => 'cramirez@gmail.com',
        //     'contrasena' => Hash::make('12345678'),
        // ]);

        // Usuario::create([
        //     'nombre' => 'Luisa Fernandez',
        //     'email' => 'lfernadez@gmail.com',
        //     'contrasena' => Hash::make('12345678'),
        // ]);

        // Usuario::create([
        //     'nombre' => 'Pedro Rodriguez',
        //     'email' => 'prodriguez@gmail.com',
        //     'contrasena' => Hash::make('12345678'),
        // ]);

        Usuario::factory(10)->create();
    }
}
