<?php

namespace Database\Seeders;

use App\Models\Expert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpertsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Expert::create([
           'name' => 'Kinan Ahmad',
           'email' => 'kinan@gmail.com',
           'password' => bcrypt('123456'),
            'image' => 'https://th.bing.com/th/id/OIP.tHP9-Z5XX7fvzAjPnLgeXAHaLH?rs=1&pid=ImgDetMain',
            'bio' => 'Here is bio. Any thing',
        ]);
        Expert::create([
            'name' => 'Mike Kingarts',
            'email' => 'mike@gmail.com',
            'password' => bcrypt('123456'),
            'image' => 'https://thumbs.dreamstime.com/z/cool-guy-8809192.jpg',
            'bio' => 'Here is bio. Any thing, something else.',
        ]);
    }
}
