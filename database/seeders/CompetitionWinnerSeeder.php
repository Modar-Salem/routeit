<?php

namespace Database\Seeders;

use App\Models\CompetitionWinner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetitionWinnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompetitionWinner::create([
           'competitor_id' => 2,
            'rank' => 2
        ]);
        CompetitionWinner::create([
            'competitor_id' => 3,
            'rank' => 1
        ]);
        CompetitionWinner::create([
            'competitor_id' => 1,
            'rank' => 3
        ]);

        CompetitionWinner::create([
            'competitor_id' => 6,
            'rank' => 3
        ]);
        CompetitionWinner::create([
            'competitor_id' => 5,
            'rank' => 1
        ]);
        CompetitionWinner::create([
            'competitor_id' => 4,
            'rank' => 2
        ]);
    }
}
