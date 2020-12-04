<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->city
        ];
    }

    /**
     * Define the model's discount state
     *
     * @return array
     */
    public function discount()
    {
        return [
            'title' => $this->faker->city,
            'discount' => $this->faker->numberBetween(0, 100)
        ];
    }
}
