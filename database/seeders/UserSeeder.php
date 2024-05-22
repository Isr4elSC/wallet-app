<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'nombre' => 'Gian Garcia',
            'email' => 'gian09@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Administrador');

        User::factory()->create([
            'nombre' => 'Juan Perez',
            'email' => 'juan@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Comercio');

        User::factory(10)->create()->assignRole('Cliente');
    }
}
