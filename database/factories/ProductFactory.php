<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(3, true),
            'price' => fake()->randomFloat(2, 10, 1000),
            'category_id' => Category::inRandomOrder()->first()->id,
            'description' => fake()->paragraph(),
            'count' => fake()->numberBetween(0, 100),
            'image' => fake()->imageUrl(640, 480, 'products', true),
            'purchase_price' => function (array $attributes) {
                return fake()->randomFloat(
                    2, 
                    $attributes['price'] * 0.5, 
                    $attributes['price'] * 0.8
                );
            },
        ];
    }
}
