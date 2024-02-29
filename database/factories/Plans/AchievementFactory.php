<?php

namespace Database\Factories\Plans;

use App\Models\Plans\Indicator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AchievementFactory extends Factory
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
            'year' => fake()->year(),
            'indicator_id' => Indicator::factory()->create()
        ];
    }
}
