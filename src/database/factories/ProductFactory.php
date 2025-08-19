<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return[
            'user_id' => User::factory(),
            // 'category_id' => Category::factory(),
            'product_name' => $this->faker->word(),
            'brand_name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(100,10000),
            'condition' => $this->faker->randomElement(['new','used','refurbished']),
            'image' => 'sample.jpg',
            'product_description' => $this->faker->sentence(),
            'status' => 'listed',
        ];
    }
}
