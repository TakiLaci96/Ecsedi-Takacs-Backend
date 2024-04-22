<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([ //admin felhasználó hozzáadása seedeléskor
            'name' => 'Test User',
            'email' => 'admin@admin.hu',
            'password' => bcrypt('123123123'),
            'adminE' => 'admin'
        ]);
        User::factory(10)->create(); //sima felhasználók hozzáadása seedeléskor
    }
}
