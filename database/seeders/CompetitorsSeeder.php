<?php

namespace Database\Seeders;

use App\Models\Competitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetitorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competitor::create([
            'competition_id' => 1,
            'mobile_user_id' => 1,
            'project_link' => 'https://github.com/Modar-Salem/routeit'
        ]);

        Competitor::create([
            'competition_id' => 1,
            'mobile_user_id' => 2,
            'project_link' => 'https://github.com/tensorflow/tensorflow'
        ]);

        Competitor::create([
            'competition_id' => 1,
            'mobile_user_id' => 3,
            'project_link' => 'https://github.com/vuejs/vue'
        ]);

        Competitor::create([
            'competition_id' => 2,
            'mobile_user_id' => 1,
            'project_link' => 'https://github.com/facebook/react'
        ]);

        Competitor::create([
            'competition_id' => 2,
            'mobile_user_id' => 2,
            'project_link' => 'https://github.com/microsoft/vscode'
        ]);

        Competitor::create([
            'competition_id' => 2,
            'mobile_user_id' => 3,
            'project_link' => 'https://github.com/microsoft/TypeScript'
        ]);

        Competitor::create([
            'competition_id' => 3,
            'mobile_user_id' => 1,
            'project_link' => 'https://github.com/opencv/opencv'
        ]);
    }
}
