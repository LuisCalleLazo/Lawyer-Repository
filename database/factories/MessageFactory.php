<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'admin_id' => Admin::factory(),
            'client_id' => Client::factory(),
            'message' => fake()->sentence(),
            'file' => 'https://res.cloudinary.com/dm0aq4bey/image/upload/v1724854661/Report/BalanceSheetBs.pdf'
        ];
    }
}
