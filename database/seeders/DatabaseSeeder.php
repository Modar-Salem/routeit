<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\UsersFollowedTechnology;
use App\Models\UserSkillComment;
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
            UserSkillCommentsSeeder::class,
            UserCommentRepliesSeeder::class,
            RoadmapUserRankingSeeder::class,
            UsersFollowedExpertsSeeder::class,
            UsersFollowedTechnologySeeder::class,
            CompanySeeder::class,
            CompetitionsSeeder::class,
            CompetitorsSeeder::class,
            CompetitionWinnerSeeder::class,
            UsersFollowedCompaniesSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
