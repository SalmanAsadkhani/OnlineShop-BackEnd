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


            'title' => $this->faker->title(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->realText(),
            'price' => $this->faker->numberBetween(1000, 10000),
            'url_image' => $this->faker->imageUrl(),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory()->create() ,
        ];
    }
}
