<?php

namespace Database\Seeders;

use App\Models\UsersFollowedExpert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersFollowedExpertsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersFollowedExpert::create([
            'mobile_user_id' => 1,
            'expert_id' => 1
        ]);
        UsersFollowedExpert::create([
            'mobile_user_id' => 1,
            'expert_id' => 2
        ]);

        UsersFollowedExpert::create([
            'mobile_user_id' => 2,
            'expert_id' => 1
        ]);
        UsersFollowedExpert::create([
            'mobile_user_id' => 2,
            'expert_id' => 2
        ]);
    }
}
