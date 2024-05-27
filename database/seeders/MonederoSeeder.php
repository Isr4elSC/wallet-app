<?php

namespace Database\Seeders;

use App\Models\Monedero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonederoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Monedero::factory(10)->create();
    }
}
