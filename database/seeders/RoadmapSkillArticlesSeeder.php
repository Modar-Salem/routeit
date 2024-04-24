<?php

namespace Database\Seeders;

use App\Models\RoadmapSkillArticle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoadmapSkillArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoadmapSkillArticle::create([
            'roadmap_skill_id' => 9,
            'title' => 'Optimizing React.js Performance'
        ]);
        RoadmapSkillArticle::create([
            'roadmap_skill_id' => 9,
            'title' => 'Boosting React.js Performance'
        ]);
        RoadmapSkillArticle::create([
            'roadmap_skill_id' => 9,
            'title' => 'Mastering React.js Performance Optimization'
        ]);
    }
}
