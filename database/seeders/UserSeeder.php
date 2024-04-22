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
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'adminE' => 'admin'
        ]);
        User::factory(10)->create(); //sima felhasználók hozzáadása seedeléskor
    }
}
