<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laptop>
 */
class LaptopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_id' => $this->faker->randomElement(Brand::pluck('id')->toArray()),
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'processor' => $this->faker->word,
            'ram' => $this->faker->word,
            'storage' => $this->faker->word,
            'gpu' => $this->faker->word,
            'display' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'quantity' => $this->faker->numberBetween(1, 100),
            'released_at' => $this->faker->date,
        ];
    }
}
