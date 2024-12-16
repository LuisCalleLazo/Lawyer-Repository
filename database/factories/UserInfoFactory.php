<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'user_id' => User::factory(),
            'country' => fake()->country(),
            'code' => fake()->numberBetween(1, 999),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'photo' => fake()->imageUrl(200, 200, 'people', true, 'User Photo'),
            // 'photo' => 'https://res.cloudinary.com/dm0aq4bey/image/upload/v1703532052/samples/breakfast.jpg',
        ];
    }
}
