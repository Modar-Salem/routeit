<?php

namespace Database\Seeders;

use App\Models\UsersFollowedCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersFollowedCompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersFollowedCompany::create([
            'mobile_user_id' => 1,
            'company_id' => 1
        ]);
        UsersFollowedCompany::create([
            'mobile_user_id' => 1,
            'company_id' => 2
        ]);

        UsersFollowedCompany::create([
            'mobile_user_id' => 2,
            'company_id' => 1
        ]);
        UsersFollowedCompany::create([
            'mobile_user_id' => 2,
            'company_id' => 2
        ]);
    }
}
