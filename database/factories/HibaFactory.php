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

        // Default image path
        $utvonal = "public/storage/images/bejelentesek/default.png";

        // Check if the default image exists
        if (file_exists($utvonal)) {
            // Read the default image
            $hibaKepe = file_get_contents($utvonal);
            // Encode the default image to base64
            $hibaKepe = base64_encode($hibaKepe);
        } else {
            // Set a default value if the image doesn't exist
            $hibaKepe = 'hiba'; // or any other default value you prefer
        }


        return [
            "hibaMegnevezese" => fake()-> word(),
            "hibaLeirasa" => fake()-> sentence(4),
            "hibaHelye" => fake()-> address(),
            "hibaKepe" => $hibaKepe,
            "hibaKepeLink" => $hibaKepeLink,
            "user_id" => $user_id,
            //"bejelentesIdopontja" => fake()->date(),
            //"hibaAllapota" => fake()-> word()
            //"hibaAllapota" => fake()-> randomElements("...", "...", "...")

        ];
    }
}
