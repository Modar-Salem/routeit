<?php

namespace Database\Seeders;

use App\Models\RoadmapSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoadmapSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoadmapSkill::create([
            'roadmap_id' => 1,
            'title' => 'Components',
        ]);
        RoadmapSkill::create([
            'roadmap_id' => 1,
            'title' => 'JSX',
        ]);
        RoadmapSkill::create([
            'roadmap_id' => 1,
            'title' => 'Virtual DOM',
        ]);
        RoadmapSkill::create([
            'roadmap_id' => 1,
            'title' => 'State',
        ]);
        RoadmapSkill::create([
            'roadmap_id' => 1,
            'title' => 'Props',
        ]);

        RoadmapSkill::create([
            'roadmap_id' => 2,
            'title' => 'Context API',
        ]);
        RoadmapSkill::create([
            'roadmap_id' => 2,
            'title' => 'Higher-Order Components',
        ]);
        RoadmapSkill::create([
            'roadmap_id' => 2,
            'title' => 'External State:',
        ]);
        RoadmapSkill::create([
            'roadmap_id' => 2,
            'title' => 'Performance Optimization',
        ]);
        RoadmapSkill::create([
            'roadmap_id' => 2,
            'title' => 'Asynchronous APIs',
        ]);
    }
}
