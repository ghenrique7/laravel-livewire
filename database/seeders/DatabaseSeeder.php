<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Plans\Plan;
use Illuminate\Support\Str;
use App\Models\Plans\TypePlan;
use Illuminate\Database\Seeder;
use App\Models\Support\Sector;
use App\Models\Plans\Achievement;
use App\Models\Plans\Category;
use App\Models\Plans\Indicator;
use App\Models\Plans\Initiative;
use App\Models\Plans\Objective;
use App\Models\Plans\Perspective;
use App\Models\Plans\Process;
use App\Models\Plans\Status;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        TypePlan::factory()
            ->count(4)
            ->sequence(
                ['name' => 'pdi', 'description' => Str::random()],
                ['name' => 'pdu', 'description' => Str::random()],
                ['name' => 'pgo', 'description' => Str::random()],
                ['name' => 'gestao institucional', 'description' => Str::random()],
            )
            ->create();

        User::factory()->create();
        Sector::factory()->create();
        Plan::factory()->create();
        Perspective::factory()->create();
        // Objective::factory()->count(5)->create();
        Indicator::factory()->create();
        Achievement::factory()->create();
    }
}
