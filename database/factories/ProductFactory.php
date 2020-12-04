<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->colorName,
            'price' => $this->faker->numberBetween(6000, 9000),
        ];
    }

    /**
     * Define model's state with all fields
     *
     * @return array
     */
    public function allFields()
    {
        return [
            'title' => $this->faker->colorName,
            'price' => $this->faker->numberBetween(6000, 9000),
            'discount_price' => $this->faker->numberBetween(1000, 5000),
            'image_url' => $this->faker->imageUrl()
        ];
    }
}
