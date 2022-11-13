<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportProduct>
 */
class ReportProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'store_id' => 1,
            // 'store_id' => \App\Models\Store::factory(),
            'product_id' => \App\Models\Product::factory(),
            'compliance' => $this->faker->numberBetween(0, 1),
            'date' => $this->faker->dateTimeBetween('2022-11-01', '2022-11-30'),
        ];
    }
}
