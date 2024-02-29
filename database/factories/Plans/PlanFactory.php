<?php

namespace Database\Factories\Plans;

use App\Models\Plans\Status;
use App\Models\Plans\TypePlan;
use App\Models\Support\Sector;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypePlan>
 */
class PlanFactory extends Factory
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
            'sector_id' => Sector::factory()->create(),
            'type_plan_id' => fake()->numberBetween(1,2),
            'initial_year' => fake()->year(),
            'status' => fake()->boolean(),
            'final_year' => fake()->year(),
            'mission' => fake()->text(),
            'vision' => fake()->text()
        ];
    }
}
