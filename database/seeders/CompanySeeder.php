<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'HP',
            'email' => 'hp1234@gmail.com',
            'password' => bcrypt('123456'),
            'location' => 'Homs',
            'image' => 'https://th.bing.com/th/id/R.116ce467a2b294dc4e49a6cd44341cf8?rik=0m1erZYKw89Ybg&pid=ImgRaw&r=0',
            'description' => 'The Hewlett-Packard Company, commonly shortened to Hewlett-Packard (/ˈhjuːlɪt ˈpækərd/ HYEW-lit PAK-ərd) or HP, was an American multinational information technology company headquartered in Palo Alto, California. HP developed and provided a wide variety of hardware components, as well as software and related services to consumers, small and medium-sized businesses (SMBs), and fairly large companies, including customers in government, health, and education sectors. The company was founded in a one-car garage in Palo Alto by Bill Hewlett and David Packard in 1939, and initially produced a line of electronic test and measurement equipment. The HP Garage at 367 Addison Avenue is now designated an official California Historical Landmark, and is marked with a plaque calling it the "Birthplace of Silicon Valley.'
        ]);

        Company::create([
            'name' => 'Google',
            'email' => 'google@example.com',
            'password' => bcrypt('google123'),
            'location' => 'Mountain View',
            'image' => 'https://example.com/google_logo.png',
            'description' => 'Google LLC is an American multinational technology company that specializes in Internet-related services and products, which include online advertising technologies, a search engine, cloud computing, software, and hardware.'
        ]);

        Company::create([
            'name' => 'Microsoft',
            'email' => 'microsoft@example.com',
            'password' => bcrypt('microsoft123'),
            'location' => 'Redmond',
            'image' => 'https://example.com/microsoft_logo.png',
            'description' => 'Microsoft Corporation is an American multinational technology company that develops, manufactures, licenses, supports, and sells computer software, consumer electronics, personal computers, and related services.'
        ]);

        Company::create([
            'name' => 'Amazon',
            'email' => 'amazon@example.com',
            'password' => bcrypt('amazon123'),
            'location' => 'Seattle',
            'image' => 'https://example.com/amazon_logo.png',
            'description' => 'Amazon.com, Inc. is an American multinational technology company based in Seattle, Washington. It is one of the world\'s largest online retailers and provides a wide range of products and services.'
        ]);

        Company::create([
            'name' => 'Tesla',
            'email' => 'tesla@example.com',
            'password' => bcrypt('tesla123'),
            'location' => 'Palo Alto',
            'image' => 'https://example.com/tesla_logo.png',
            'description' => 'Tesla, Inc. is an American electric vehicle and clean energy company. It designs, manufactures, and sells electric cars, electric vehicle powertrain components, and energy storage products.'
        ]);
    }
}
