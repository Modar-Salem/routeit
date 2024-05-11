<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SkillComment;
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
            RoadmapSkillVideosSeeder::class,
            RoadmapSkillArticlesSeeder::class,
            ArticleSectionsSeeder::class,
            TestsSeeder::class,
            TestQuestionsSeeder::class,
            SkillCommentsSeeder::class,
            CommentRepliesSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
