<?php

namespace Database\Factories;

use App\Models\BookStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(15),
            'value' => $this->faker->randomFloat(2, 0, 150),
            'status_id' => BookStatus::inRandomOrder()->first()->id,
            'user_id' => User::factory(),
        ];
    }
}
