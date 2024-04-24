<?php

namespace Database\Seeders;

use App\Models\RoadmapSkillVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoadmapSkillVideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoadmapSkillVideo::create([
           'roadmap_skill_id' => 1,
           'title' => 'Functional Components',
        ]);
        RoadmapSkillVideo::create([
            'roadmap_skill_id' => 1,
            'title' => 'Class Components:',
        ]);
        RoadmapSkillVideo::create([
            'roadmap_skill_id' => 1,
            'title' => 'Component Composition',
        ]);
        RoadmapSkillVideo::create([
            'roadmap_skill_id' => 1,
            'title' => 'Nested Components',
        ]);

        RoadmapSkillVideo::create([
            'roadmap_skill_id' => 9,
            'title' => 'Virtualize Long Lists',
        ]);
        RoadmapSkillVideo::create([
            'roadmap_skill_id' => 9,
            'title' => 'Avoid Reconciliation',
        ]);
        RoadmapSkillVideo::create([
            'roadmap_skill_id' => 9,
            'title' => 'Use the Production Build',
        ]);
        RoadmapSkillVideo::create([
            'roadmap_skill_id' => 9,
            'title' => 'useMemo and useCallback Hooks',
        ]);
    }
}
