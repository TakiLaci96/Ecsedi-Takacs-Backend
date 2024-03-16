<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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

        return [
            "hibaMegnevezese" => fake()-> word(),
            "hibaLeirasa" => fake()-> sentence(4),
            "hibaHelye" => fake()-> address(),
            "hibaKepe" => fake()->word(),
            "bejelentesIdopontja" => fake()->date(),
            //"hibaAllapota" => fake()-> word()
            //"hibaAllapota" => fake()-> randomElements("...", "...", "...")
        ];
    }
}
