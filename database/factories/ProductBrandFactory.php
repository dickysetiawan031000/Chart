<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductBrand>
 */
class ProductBrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'brand_name' => $this->faker->randomElement(['Susu Kaleng', 'Roti Tawar']),
            [
                'brand_name' => 'Roti Tawar'
            ],
            [
                'brand_name' => 'Susu Kaleng'
            ]
        ];
    }
}
