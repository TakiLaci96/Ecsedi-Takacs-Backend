<?php

namespace Database\Seeders;

use App\Models\Hiba;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HibaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hiba::factory(10)->create();
    }
}
