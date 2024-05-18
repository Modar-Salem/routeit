<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoadmapUserRankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roadmap_users_rankings')->insert([
            'mobile_user_id' => 1,
            'roadmap_id' => 2,
            'userXP' => 100
        ]);
        DB::table('roadmap_users_rankings')->insert([
            'mobile_user_id' => 2,
            'roadmap_id' => 2,
            'userXP' => 2000
        ]);
        DB::table('roadmap_users_rankings')->insert([
            'mobile_user_id' => 3,
            'roadmap_id' => 2,
            'userXP' => 1500
        ]);
    }
}
