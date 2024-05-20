<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Database\Seeders\UsuarioSeeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*Usuario::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/



        //Llamamos el seeder de roles
        $this->call(RoleSeeder::class);
        //Llamamos el seeder de usuarios
        $this->call(UsuarioSeeder::class);
    }
}
