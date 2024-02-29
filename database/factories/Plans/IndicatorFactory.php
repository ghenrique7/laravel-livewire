<?php

namespace Database\Factories\Plans;

use App\Models\Plans\Objective;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class IndicatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'classification' => fake()->name(),
            'polarity' => fake()->name(),
            'calc_description' => fake()->name(),
            'finality' => fake()->name(),
            'periodicity' => fake()->text(),
            'data_font' => fake()->text(),
            'collect_form' => fake()->text(),
            'objective_id' => Objective::factory()->create()
        ];
    }
}
