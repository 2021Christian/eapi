<?php

namespace Database\Factories\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'detail' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(1000, 10000),
            'stock' => $this->faker->randomDigit,
            'discount' => $this->faker->numberBetween(2,30),
            'user_id' => function()
                {
                return User::all()->random();
                }
        ];
    }
}
