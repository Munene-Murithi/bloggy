<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */

class UserFactory extends Factory
{
    /**
     * Generate a random Kenyan phone number.
     *
     * @return string
     */
    public function generateKenyanPhoneNumber(): string
    {
        $prefixes = ['070', '071', '072', '073', '074', '075', '076', '077', '078', '079', '011', '010'];

        $randomPrefix = $prefixes[array_rand($prefixes)];
        $randomNumber = mt_rand(100000, 999999);

        return '+254' . $randomPrefix . $randomNumber;
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->generateKenyanPhoneNumber(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

