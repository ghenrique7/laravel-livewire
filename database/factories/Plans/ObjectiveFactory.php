<?php

namespace Database\Factories\Plans;

use App\Models\Plans\Category;
use App\Models\Plans\Perspective;
use App\Models\Plans\Plan;
use App\Models\Plans\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ObjectiveFactory extends Factory
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
            'description' => fake()->text(),
            'level' => fake()->text(),
            'perspective_id' => Perspective::factory()->create(),
            'plan_id' => Plan::factory()->create(),
            'theme_id' => Theme::factory()->create(),
        ];
    }
}
