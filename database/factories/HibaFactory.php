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
        //létrehoz egy képet
        $hibaKepeLink = fake()->image("public/storage/images/bejelentesek", 640, 480, null, false); //hova mentse a képet
        $hibaKepeLink = "storage/images/bejelentesek/".$hibaKepeLink; //kép elérési útja, hogy majd elérjük frontenden

        return [
            "hibaMegnevezese" => fake()-> word(),
            "hibaLeirasa" => fake()-> sentence(4),
            "hibaHelye" => fake()-> address(),
            "hibaKepe" => fake()-> word(),
            "hibaKepeLink" => $hibaKepeLink,
            "user_id" => $user_id,
            //"bejelentesIdopontja" => fake()->date(),
            //"hibaAllapota" => fake()-> word()
            //"hibaAllapota" => fake()-> randomElements("...", "...", "...")

        ];
    }
}
