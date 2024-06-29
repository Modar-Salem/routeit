<?php

namespace Database\Seeders;

use App\Models\UsersFollowedTechnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersFollowedTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersFollowedTechnology::create([
            'mobile_user_id' => 1,
            'technology_id' => 1
        ]);
        UsersFollowedTechnology::create([
            'mobile_user_id' => 1,
            'technology_id' => 2
        ]);
        UsersFollowedTechnology::create([
            'mobile_user_id' => 1,
            'technology_id' => 3
        ]);
        UsersFollowedTechnology::create([
            'mobile_user_id' => 1,
            'technology_id' => 4
        ]);

        UsersFollowedTechnology::create([
            'mobile_user_id' => 2,
            'technology_id' => 1
        ]);
        UsersFollowedTechnology::create([
            'mobile_user_id' => 2,
            'technology_id' => 2
        ]);
        UsersFollowedTechnology::create([
            'mobile_user_id' => 2,
            'technology_id' => 3
        ]);
        UsersFollowedTechnology::create([
            'mobile_user_id' => 2,
            'technology_id' => 4
        ]);
    }
}
