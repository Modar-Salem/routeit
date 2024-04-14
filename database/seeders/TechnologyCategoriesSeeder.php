<?php

namespace Database\Seeders;

use App\Models\TechnologyCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologyCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TechnologyCategory::create([
            'name' => 'Front End',
            'name_ar' => 'تطوير الواجهات الأمامية',
            'description' => 'Front-end developers focus on the visual layout, user interface/interaction, and user experience. They create components and features that are directly accessed by a user through the front-end of a website. Front end developer responsibilities include everything on a website that users see, touch, click, and use including the UX and UI of the website or web application.',
            'description_ar' => 'يركز مطورو الواجهة الأمامية على التخطيط المرئي وواجهة المستخدم/التفاعل وتجربة المستخدم. يقومون بإنشاء مكونات وميزات يمكن للمستخدم الوصول إليها مباشرة من خلال الواجهة الأمامية لموقع الويب. تتضمن مسؤوليات مطور الواجهة الأمامية كل ما يراه المستخدمون على موقع الويب، ويلمسونه، وينقرون عليه، ويستخدمونه، بما في ذلك تجربة المستخدم وواجهة المستخدم الخاصة بموقع الويب أو تطبيق الويب.',
            'image' => 'https://th.bing.com/th/id/R.9da99ee4d7999e71b3d6a8326ee3b19b?rik=tFw5nx4O9aLy8Q&pid=ImgRaw&r=0',
        ]);
        TechnologyCategory::create([
            'name' => 'Back End',
            'name_ar' => 'تطوير الواجهات الخلفية',
            'description' => 'Backend Development refers to the server-side development of the web application. It is the part of the application where the server and database reside and the logics is build to perform operations. It includes the main features and functionalities of the application on the server.',
            'description_ar' => 'يشير تطوير الواجهة الخلفية إلى التطوير من جانب الخادم لتطبيق الويب. إنه جزء من التطبيق حيث يوجد الخادم وقاعدة البيانات ويتم إنشاء المنطق لتنفيذ العمليات. ويتضمن الميزات والوظائف الرئيسية للتطبيق على الخادم',
            'image' => 'https://th.bing.com/th/id/OIP.LpuVGhRLhptCkcPtiabL6QHaEx?rs=1&pid=ImgDetMain',
        ]);
        TechnologyCategory::create([
            'name' => 'Front End',
            'name_ar' => 'تطوير الواجهات الأمامية',
            'description' => 'Front-end developers focus on the visual layout, user interface/interaction, and user experience. They create components and features that are directly accessed by a user through the front-end of a website. Front end developer responsibilities include everything on a website that users see, touch, click, and use including the UX and UI of the website or web application.',
            'description_ar' => 'يركز مطورو الواجهة الأمامية على التخطيط المرئي وواجهة المستخدم/التفاعل وتجربة المستخدم. يقومون بإنشاء مكونات وميزات يمكن للمستخدم الوصول إليها مباشرة من خلال الواجهة الأمامية لموقع الويب. تتضمن مسؤوليات مطور الواجهة الأمامية كل ما يراه المستخدمون على موقع الويب، ويلمسونه، وينقرون عليه، ويستخدمونه، بما في ذلك تجربة المستخدم وواجهة المستخدم الخاصة بموقع الويب أو تطبيق الويب.',
            'image' => 'https://th.bing.com/th/id/R.9da99ee4d7999e71b3d6a8326ee3b19b?rik=tFw5nx4O9aLy8Q&pid=ImgRaw&r=0',
        ]);
        TechnologyCategory::create([
            'name' => 'Back End',
            'name_ar' => 'تطوير الواجهات الخلفية',
            'description' => 'Backend Development refers to the server-side development of the web application. It is the part of the application where the server and database reside and the logics is build to perform operations. It includes the main features and functionalities of the application on the server.',
            'description_ar' => 'يشير تطوير الواجهة الخلفية إلى التطوير من جانب الخادم لتطبيق الويب. إنه جزء من التطبيق حيث يوجد الخادم وقاعدة البيانات ويتم إنشاء المنطق لتنفيذ العمليات. ويتضمن الميزات والوظائف الرئيسية للتطبيق على الخادم',
            'image' => 'https://th.bing.com/th/id/OIP.LpuVGhRLhptCkcPtiabL6QHaEx?rs=1&pid=ImgDetMain',
        ]);
        TechnologyCategory::create([
            'name' => 'Front End',
            'name_ar' => 'تطوير الواجهات الأمامية',
            'description' => 'Front-end developers focus on the visual layout, user interface/interaction, and user experience. They create components and features that are directly accessed by a user through the front-end of a website. Front end developer responsibilities include everything on a website that users see, touch, click, and use including the UX and UI of the website or web application.',
            'description_ar' => 'يركز مطورو الواجهة الأمامية على التخطيط المرئي وواجهة المستخدم/التفاعل وتجربة المستخدم. يقومون بإنشاء مكونات وميزات يمكن للمستخدم الوصول إليها مباشرة من خلال الواجهة الأمامية لموقع الويب. تتضمن مسؤوليات مطور الواجهة الأمامية كل ما يراه المستخدمون على موقع الويب، ويلمسونه، وينقرون عليه، ويستخدمونه، بما في ذلك تجربة المستخدم وواجهة المستخدم الخاصة بموقع الويب أو تطبيق الويب.',
            'image' => 'https://th.bing.com/th/id/R.9da99ee4d7999e71b3d6a8326ee3b19b?rik=tFw5nx4O9aLy8Q&pid=ImgRaw&r=0',
        ]);
        TechnologyCategory::create([
            'name' => 'Back End',
            'name_ar' => 'تطوير الواجهات الخلفية',
            'description' => 'Backend Development refers to the server-side development of the web application. It is the part of the application where the server and database reside and the logics is build to perform operations. It includes the main features and functionalities of the application on the server.',
            'description_ar' => 'يشير تطوير الواجهة الخلفية إلى التطوير من جانب الخادم لتطبيق الويب. إنه جزء من التطبيق حيث يوجد الخادم وقاعدة البيانات ويتم إنشاء المنطق لتنفيذ العمليات. ويتضمن الميزات والوظائف الرئيسية للتطبيق على الخادم',
            'image' => 'https://th.bing.com/th/id/OIP.LpuVGhRLhptCkcPtiabL6QHaEx?rs=1&pid=ImgDetMain',
        ]);
    }
}
