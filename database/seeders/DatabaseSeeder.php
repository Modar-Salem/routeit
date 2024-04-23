<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TechnologyLevel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MobileUserSeeder::class,
            TechnologyCategoriesSeeder::class,
            TechnologiesSeeder::class,
            TechnologyLevelsSeeder::class,
            ExpertsSeeder::class,
            RoadmapsSeeder::class,
            RoadmapSkillsSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
