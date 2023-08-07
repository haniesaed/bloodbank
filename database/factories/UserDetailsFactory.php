<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDetails>
 */
class UserDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "blood_type" => fake()->randomElement(['AB+' , 'AB-' , 'A+', 'A-' , 'B+' , 'B-', 'O+' , 'O-']),
            "location" => fake()->streetAddress(),
            "phone" => fake()->phoneNumber(),
            "user_id" => rand(1 , 10),
        ];
    }
}
