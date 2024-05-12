<?php

namespace Database\Seeders;

use App\Models\MobileUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobileUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MobileUser::create([
            'email' => 'wassim@gmail.com',
            'password' => bcrypt('123456'),
            'name' => 'wassim',
            'image' => 'https://th.bing.com/th/id/OIP.v36XBUcQei_95GjMzpAGRgHaLH?w=181&h=272&c=7&r=0&o=5&dpr=1.4&pid=1.7',
            'birth_date' => '1880-01-20',
            'it_student' => true,
            'university' => 'Damascuse University',
            'bio' => 'No bio needed',
            'verify' => true,
            'completed' => true
        ]);
        MobileUser::create([
            'email' => 'wassim2@gmail.com',
            'password' => bcrypt('123456'),
            'name' => 'wassim2',
            'image' => 'https://thumbs.dreamstime.com/z/cool-guy-8809192.jpg',
            'birth_date' => '1989-02-24',
            'it_student' => false,
            'university' => 'Aleppo University',
            'bio' => 'bio needed',
        ]);
        MobileUser::create([
            'email' => 'wassim3@gmail.com',
            'password' => bcrypt('123456'),
            'name' => 'wassim3',
            'image' => 'https://th.bing.com/th/id/OIP.tHP9-Z5XX7fvzAjPnLgeXAHaLH?rs=1&pid=ImgDetMain',
            'birth_date' => '2000-03-09',
            'it_student' => false,
            'university' => 'Another University',
            'bio' => 'bio needed',
        ]);

    }
}
