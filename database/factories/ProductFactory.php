<?php

namespace Database\Factories;

use App\Enums\ProductStatus;
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
            'article' => fake()->unique()->name(),
            'name' => fake()->name(),
            'status' => fake()->randomElement(ProductStatus::values()),
            'data' => [
                'color' => fake()->colorName(),
                'size' => fake()->randomNumber()
            ],
        ];
    }
}
