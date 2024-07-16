<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetitionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competition::create([
            'name' => 'Watermelon',
            'company_id' => 1,
            'start_date' => '2024-01-01',
            'end_date' => '2024-01-05',
            'description' => 'One hot summer day Pete and his friend Billy decided to buy a watermelon. They chose the biggest and the ripest one, in their opinion. After that the watermelon was weighed, and the scales showed w kilos. They rushed home, dying of thirst, and decided to divide the berry, however they faced a hard problem.

Pete and Billy are great fans of even numbers, that\'s why they want to divide the watermelon in such a way that each of the two parts weighs even number of kilos, at the same time it is not obligatory that the parts are equal. The boys are extremely tired and want to start their meal as soon as possible, that\'s why you should help them and find out, if they can divide the watermelon in the way they want. For sure, each of them should get a part of positive weight.'
        ]);

        Competition::create([
            'name' => 'Chess Tournament',
            'company_id' => 1,
            'start_date' => '2024-02-15',
            'end_date' => '2024-02-20',
            'description' => 'A chess tournament for players of all skill levels. Join us for a week of intense strategizing and exciting matches.'
        ]);

        Competition::create([
            'name' => 'Photography Contest',
            'company_id' => 2,
            'start_date' => '2024-03-10',
            'end_date' => '2024-03-15',
            'description' => 'Showcase your photography skills in our annual photography contest. Capture stunning moments and win amazing prizes.'
        ]);

        Competition::create([
            'name' => 'Coding Challenge',
            'company_id' => 2,
            'start_date' => '2024-04-01',
            'end_date' => '2025-04-05',
            'description' => 'Put your coding skills to the test in our coding challenge. Solve complex problems and compete against other developers.'
        ]);

        Competition::create([
            'name' => 'Dance Competition',
            'company_id' => 3,
            'start_date' => '2024-05-20',
            'end_date' => '2025-05-25',
            'description' => 'Calling all dancers! Showcase your talent and passion in our annual dance competition. From hip-hop to ballet, all styles are welcome.'
        ]);

        Competition::create([
            'name' => 'Coding Challenge',
            'company_id' => 2,
            'start_date' => '2025-04-01',
            'end_date' => '2025-04-05',
            'description' => 'Put your coding skills to the test in our coding challenge. Solve complex problems and compete against other developers.'
        ]);

        Competition::create([
            'name' => 'Dance Competition',
            'company_id' => 3,
            'start_date' => '2025-05-20',
            'end_date' => '2025-05-25',
            'description' => 'Calling all dancers! Showcase your talent and passion in our annual dance competition. From hip-hop to ballet, all styles are welcome.'
        ]);
    }
}
