<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Test::create([
            'technology_id' => 1,
            'roadmap_skill_id' => 1,
            'total_xp' => 50,
        ]);
        Test::create([
            'technology_id' => 1,
            'roadmap_skill_id' => 9,
            'total_xp' => 50,
        ]);
        Test::create([
            'technology_id' => 1,
            'roadmap_skill_id' => 10,
            'total_xp' => 50,
        ]);
    }
}
