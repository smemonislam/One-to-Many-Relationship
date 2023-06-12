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
            'category_id'   => Category::get()->random()->id,
            'name'      => fake()->randomElement([
                "Nike",
                "Patagonia",
                "Amazon",
                "Virgin",
                "Monocle",
                "Apple",
                "Greyhound",
                "Lush",
                "Descriptive Brand Names",
                "Evocative Brand Names",
            ]),
            'slug'      => fake()->unique()->slug(),
            'price'     => fake()->numberBetween($min = 500, $max = 8000),
        ];
    }
}
