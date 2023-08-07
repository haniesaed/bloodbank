<?php

namespace Database\Factories;

use App\Models\BloodDonation;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RequestDonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "blood_donation_id" => rand(1 , 10),
            "user_id" => function (array $attributes) {
                return BloodDonation::where('id' , $attributes['blood_donation_id'])->pluck('user_id')[0];
            },
            "status" => fake()->randomElement(["Approved" , "Pending"]),
        ];
    }
}
