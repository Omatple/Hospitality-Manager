<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
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
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));

        return [
            "name" => fake()->unique()->realText(10),
            "description" => fake()->realText(200),
            "price" => fake()->randomFloat(2, 1, 20),
            "stock" => random_int(0, 99),
            "image" => "products/images/" . fake()->picsum(public_path("storage/products/images"), 640, 640, false),
            "category_id" => Category::all()->random()->id,
        ];
    }
}
