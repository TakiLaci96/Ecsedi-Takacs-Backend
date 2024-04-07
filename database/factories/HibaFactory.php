<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hiba>
 */
class HibaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //összeköti a hibát a userrel
        $allUserId = User::all()->pluck('id');
        $user_id = fake()->randomElement($allUserId);

        return [
            "hibaMegnevezese" => fake()-> word(),
            "hibaLeirasa" => fake()-> sentence(4),
            "hibaHelye" => fake()-> address(),
            "hibaKepe" => fake()->word(),
            //"bejelentesIdopontja" => fake()->date(),
            "user_id" => $user_id,
            //"hibaAllapota" => fake()-> word()
            //"hibaAllapota" => fake()-> randomElements("...", "...", "...")

        ];
    }
}
