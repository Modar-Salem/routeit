<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Technology::create([
            'technology_category_id' => 1,
            'name' => 'React.js',
            'name_ar' => 'React.js',
            'description' => 'ReactJS, also known as React, is a popular JavaScript library for building user interfaces. It is also referred to as a front-end JavaScript library. It was developed by Facebook and is widely used for creating dynamic and interactive web applications.',
            'description_ar' => '، والمعروفة أيضًا باسم React، هي مكتبة JavaScript شائعة لبناء واجهات المستخدم. ويشار إليها أيضًا باسم مكتبة JavaScript للواجهة الأمامية. تم تطويره بواسطة Facebook ويستخدم على نطاق واسع لإنشاء تطبيقات الويب الديناميكية والتفاعلية.',
            'image' => 'https://th.bing.com/th/id/OIP.0Pg08-2UoVjYkZ2gHddmbQHaEK?rs=1&pid=ImgDetMain',
        ]);
        Technology::create([
            'technology_category_id' => 1,
            'name' => 'Angular.js',
            'name_ar' => 'Angular.js',
            'description' => 'Angular is a popular open-source Typescript framework created by Google for developing web applications. Front-end developers use frameworks like Angular or React to present and manipulate data efficiently and dynamically.',
            'description_ar' => ' هو إطار عمل Typescript شائع مفتوح المصدر تم إنشاؤه بواسطة Google لتطوير تطبيقات الويب. يستخدم مطورو الواجهة الأمامية أطر عمل مثل Angular أو React لتقديم البيانات ومعالجتها بكفاءة وديناميكية.',
            'image' => 'https://th.bing.com/th/id/R.bb79a099832ae287d3778941b59b5bc5?rik=%2b7c4onrNe3VV3A&pid=ImgRaw&r=0',
        ]);
        Technology::create([
            'technology_category_id' => 1,
            'name' => 'Vue.js',
            'name_ar' => 'Vue.js',
            'description' => 'Vue.js is a JavaScript framework for building user interfaces. It builds on top of standard HTML, CSS, and JavaScript and provides a declarative, component-based programming model that helps you efficiently develop user interfaces of any complexity.',
            'description_ar' => ' هو إطار عمل JavaScript لبناء واجهات المستخدم. إنه يعتمد على HTML وCSS وJavaScript القياسي ويوفر نموذج برمجة تعريفيًا قائمًا على المكونات يساعدك على تطوير واجهات المستخدم بكفاءة مهما كانت درجة تعقيدها.',
            'image' => 'https://th.bing.com/th/id/R.9cd182c5ccfb93025e85ef98bc18c9cf?rik=kV7toJhArk1ocQ&pid=ImgRaw&r=0',
        ]);
        Technology::create([
            'technology_category_id' => 1,
            'name' => 'React.js',
            'name_ar' => 'React.js',
            'description' => 'ReactJS, also known as React, is a popular JavaScript library for building user interfaces. It is also referred to as a front-end JavaScript library. It was developed by Facebook and is widely used for creating dynamic and interactive web applications.',
            'description_ar' => '، والمعروفة أيضًا باسم React، هي مكتبة JavaScript شائعة لبناء واجهات المستخدم. ويشار إليها أيضًا باسم مكتبة JavaScript للواجهة الأمامية. تم تطويره بواسطة Facebook ويستخدم على نطاق واسع لإنشاء تطبيقات الويب الديناميكية والتفاعلية.',
            'image' => 'https://th.bing.com/th/id/OIP.0Pg08-2UoVjYkZ2gHddmbQHaEK?rs=1&pid=ImgDetMain',
        ]);
        Technology::create([
            'technology_category_id' => 1,
            'name' => 'Angular.js',
            'name_ar' => 'Angular.js',
            'description' => 'Angular is a popular open-source Typescript framework created by Google for developing web applications. Front-end developers use frameworks like Angular or React to present and manipulate data efficiently and dynamically.',
            'description_ar' => ' هو إطار عمل Typescript شائع مفتوح المصدر تم إنشاؤه بواسطة Google لتطوير تطبيقات الويب. يستخدم مطورو الواجهة الأمامية أطر عمل مثل Angular أو React لتقديم البيانات ومعالجتها بكفاءة وديناميكية.',
            'image' => 'https://th.bing.com/th/id/R.bb79a099832ae287d3778941b59b5bc5?rik=%2b7c4onrNe3VV3A&pid=ImgRaw&r=0',
        ]);
        Technology::create([
            'technology_category_id' => 1,
            'name' => 'Vue.js',
            'name_ar' => 'Vue.js',
            'description' => 'Vue.js is a JavaScript framework for building user interfaces. It builds on top of standard HTML, CSS, and JavaScript and provides a declarative, component-based programming model that helps you efficiently develop user interfaces of any complexity.',
            'description_ar' => ' هو إطار عمل JavaScript لبناء واجهات المستخدم. إنه يعتمد على HTML وCSS وJavaScript القياسي ويوفر نموذج برمجة تعريفيًا قائمًا على المكونات يساعدك على تطوير واجهات المستخدم بكفاءة مهما كانت درجة تعقيدها.',
            'image' => 'https://th.bing.com/th/id/R.9cd182c5ccfb93025e85ef98bc18c9cf?rik=kV7toJhArk1ocQ&pid=ImgRaw&r=0',
        ]);
        Technology::create([
            'technology_category_id' => 2,
            'name' => 'Django',
            'name_ar' => 'Django',
            'description' => 'Django is a high-level Python web framework that enables rapid development of secure and maintainable websites. Built by experienced developers, Django takes care of much of the hassle of web development, so you can focus on writing your app without needing to reinvent the wheel.',
            'description_ar' => ' هو إطار ويب Python عالي المستوى يتيح التطوير السريع لمواقع الويب الآمنة والقابلة للصيانة. تم تصميم Django بواسطة مطورين ذوي خبرة، وهو يعتني بالكثير من متاعب تطوير الويب، حتى تتمكن من التركيز على كتابة تطبيقك دون الحاجة إلى إعادة اختراع العجلة.',
            'image' => 'https://th.bing.com/th/id/OIP.kD9TX4LaVeAGJI2ga48nuwHaEK?rs=1&pid=ImgDetMain',
        ]);
        Technology::create([
            'technology_category_id' => 2,
            'name' => 'Laravel',
            'name_ar' => 'Laravel',
            'description' => 'Laravel is a powerful open-source PHP web application framework known for its elegant syntax and robust features. It was created by Taylor Otwell and is intended for the development of web applications following the model–view–controller (MVC) architectural pattern.',
            'description_ar' => ' هو إطار تطبيق ويب PHP قوي ومفتوح المصدر معروف بتركيبه الأنيق وميزاته القوية. تم إنشاؤه بواسطة Taylor Otwell وهو مخصص لتطوير تطبيقات الويب وفقًا للنمط المعماري للنموذج والعرض والتحكم (MVC).',
            'image' => 'https://th.bing.com/th/id/OIP.RmnSs_BYHekF1vmqonuRQgHaEN?rs=1&pid=ImgDetMain',
        ]);
        Technology::create([
            'technology_category_id' => 2,
            'name' => 'Spring Boot',
            'name_ar' => 'Spring Boot',
            'description' => 'Spring Boot is an open source Java-based framework used to create a micro Service. It isdeveloped by Pivotal Team and is used to build stand-alone and production ready spring applications.',
            'description_ar' => ' هو إطار عمل مفتوح المصدر قائم على Java يُستخدم لإنشاء خدمة صغيرة. تم تطويره بواسطة Pivotal Team ويستخدم لبناء تطبيقات زنبركية مستقلة وجاهزة للإنتاج.',
            'image' => 'https://th.bing.com/th/id/OIP.RYFPr-iiD9iBpdncXfX1PAAAAA?rs=1&pid=ImgDetMain',
        ]);
        Technology::create([
            'technology_category_id' => 2,
            'name' => 'Django',
            'name_ar' => 'Django',
            'description' => 'Django is a high-level Python web framework that enables rapid development of secure and maintainable websites. Built by experienced developers, Django takes care of much of the hassle of web development, so you can focus on writing your app without needing to reinvent the wheel.',
            'description_ar' => ' هو إطار ويب Python عالي المستوى يتيح التطوير السريع لمواقع الويب الآمنة والقابلة للصيانة. تم تصميم Django بواسطة مطورين ذوي خبرة، وهو يعتني بالكثير من متاعب تطوير الويب، حتى تتمكن من التركيز على كتابة تطبيقك دون الحاجة إلى إعادة اختراع العجلة.',
            'image' => 'https://th.bing.com/th/id/OIP.kD9TX4LaVeAGJI2ga48nuwHaEK?rs=1&pid=ImgDetMain',
        ]);
        Technology::create([
            'technology_category_id' => 2,
            'name' => 'Laravel',
            'name_ar' => 'Laravel',
            'description' => 'Laravel is a powerful open-source PHP web application framework known for its elegant syntax and robust features. It was created by Taylor Otwell and is intended for the development of web applications following the model–view–controller (MVC) architectural pattern.',
            'description_ar' => ' هو إطار تطبيق ويب PHP قوي ومفتوح المصدر معروف بتركيبه الأنيق وميزاته القوية. تم إنشاؤه بواسطة Taylor Otwell وهو مخصص لتطوير تطبيقات الويب وفقًا للنمط المعماري للنموذج والعرض والتحكم (MVC).',
            'image' => 'https://th.bing.com/th/id/OIP.RmnSs_BYHekF1vmqonuRQgHaEN?rs=1&pid=ImgDetMain',
        ]);
        Technology::create([
            'technology_category_id' => 2,
            'name' => 'Spring Boot',
            'name_ar' => 'Spring Boot',
            'description' => 'Spring Boot is an open source Java-based framework used to create a micro Service. It isdeveloped by Pivotal Team and is used to build stand-alone and production ready spring applications.',
            'description_ar' => ' هو إطار عمل مفتوح المصدر قائم على Java يُستخدم لإنشاء خدمة صغيرة. تم تطويره بواسطة Pivotal Team ويستخدم لبناء تطبيقات زنبركية مستقلة وجاهزة للإنتاج.',
            'image' => 'https://th.bing.com/th/id/OIP.RYFPr-iiD9iBpdncXfX1PAAAAA?rs=1&pid=ImgDetMain',
        ]);
    }
}
