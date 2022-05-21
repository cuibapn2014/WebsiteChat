<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'image' => 'https://scontent-hkg4-2.xx.fbcdn.net/v/t39.30808-6/273902916_3117098295226682_6654488078655117931_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=6ZqI1qd-zYEAX9dTMIT&_nc_ht=scontent-hkg4-2.xx&oh=00_AT_eBTylPr3arL2DkArozNwN1NGV_eKMN-p8iJKgvqlIxw&oe=628C4429',
            'email_verified_at' => now(),
            'conversation_id' => 1,
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
