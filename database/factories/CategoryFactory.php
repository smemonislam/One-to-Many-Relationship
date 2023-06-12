<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'  => fake()->unique()->randomElement(
                [
                    "Women's & Girls' Fashion", 
                    "Health & Beauty", 
                    "Watches, Bags, Jewellery",
                    "Men's & Boys' Fashion", 
                    "Mother & Baby", 
                    "Electronics Devices", 
                    "TV & Home Appliances", 
                    "Electronic Accessories", 
                    "Groceries", 
                    "Home & Lifestyle", 
                    "Sports & Outdoors",
                    "Automotive & Motorbike"
                ]
            ),
            'slug'  => fake()->unique()->slug(),
        ];
    }
}
