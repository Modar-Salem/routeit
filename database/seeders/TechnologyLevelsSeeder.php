<?php

namespace Database\Seeders;

use App\Models\TechnologyLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologyLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TechnologyLevel::create([
            'level' => 'junior',
            'technology_id' => 1,
        ]);
        TechnologyLevel::create([
            'level' => 'mid-level',
            'technology_id' => 1,
        ]);
        TechnologyLevel::create([
            'level' => 'senior',
            'technology_id' => 1,
        ]);
        TechnologyLevel::create([
            'level' => 'junior',
            'technology_id' => 2,
        ]);
        TechnologyLevel::create([
            'level' => 'mid-level',
            'technology_id' => 2,
        ]);
        TechnologyLevel::create([
            'level' => 'senior',
            'technology_id' => 2,
        ]);
    }
}
