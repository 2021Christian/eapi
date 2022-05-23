<?php

namespace Database\Factories\Model;

use App\Models\Model\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => function(){
                return Product::all()->random();
            },
            'customer' => $this->faker->name,
            'review' => $this->faker->paragraph,
            'star' => $this->faker->numberBetween(0,5)
        ];
    }
}
