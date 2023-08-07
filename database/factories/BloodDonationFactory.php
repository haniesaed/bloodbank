<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BloodDonation>
 */
class BloodDonationFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => rand(1 , 10),
            "location" => function (array $attributes) {
                return UserDetails::find($attributes['user_id'])->location;
            },
            "blood_type" => function (array $attributes) {
                return UserDetails::find($attributes['user_id'])->blood_type;
            },
            "quantity" => fake()->randomFloat(2 , 0.10 , 10),
        ];
    }
}
