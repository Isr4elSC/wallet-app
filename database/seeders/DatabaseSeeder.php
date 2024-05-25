<?php

namespace Database\Seeders;

use App\Models\Comercio;
use App\Models\Monedero;
use App\Models\Transaccion;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RoleSeeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        Comercio::factory(10)->create();
        Monedero::factory(10)->create();
        Transaccion::factory(10)->create();



        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        //Llamamos el seeder de roles
        $this->call(RoleSeeder::class);
        //Llamamos el seeder de usuarios
        // $this->call(UserSeeder::class);
        //llaamamos el seeder de comercios
        // $this->call(ComercioSeeder::class);
        // $this->call(MonederoSeeder::class);
        // $this->call(ComercioSeeder::class);
        // $this->call(TransaccionSeeder::class);
    }
}
