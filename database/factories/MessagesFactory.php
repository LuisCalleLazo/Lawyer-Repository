<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Lawyer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MessagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lawyer_id' => Lawyer::factory(),
            'client_id' => Client::factory(),
            'message' => fake()->sentence(),
            'file' => 'https://res.cloudinary.com/dm0aq4bey/image/upload/v1724854661/Report/BalanceSheetBs.pdf'
        ];
    }
}
