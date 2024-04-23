<?php

namespace Database\Seeders;

use App\Models\Roadmap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoadmapsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roadmap::create([
            'expert_id' => 1,
            'technology_level_id' => 1,
            'technology_id' => 1,
            'title' => 'Roadmap title',
            'title_ar' => 'عنوان خارطة الطريق',
            'description' => 'Roadmap Basics A roadmap is a strategic plan that defines a goal or desired outcome and includes the major steps or milestones needed to reach it. It also serves as a communication tool, a high-level document that helps articulate strategic thinking—the why—behind both the goal and the plan for getting there.',
            'description_ar' => 'أساسيات خريطة الطريق
تعد خريطة الطريق خطة استراتيجية تحدد هدفًا أو نتيجة مرغوبة وتتضمن الخطوات الرئيسية أو الأهداف الرئيسية اللازمة لتحقيقها. كما تعمل كأداة اتصال، وثيقة عالية المستوى تساعد في توضيح التفكير الاستراتيجي - السبب وراء كل من الهدف والخطة للوصول إليه.',
            'cover' => 'https://th.bing.com/th/id/OIP.A5-zvJIhGPhoDpDn8xi_cQHaEy?rs=1&pid=ImgDetMain',
        ]);
        Roadmap::create([
            'expert_id' => 1,
            'technology_level_id' => 1,
            'technology_id' => 1,
            'title' => 'Another Roadmap',
            'title_ar' => 'عنوان خارطة أخر',
            'description' => 'Every team has a plan and strategy built around doing what pushes the business goals forward. When you’re busy executing the strategy, you can get lost in day-to-day task management. A roadmap is one of the most effective tools for rising above the granular details and chaos. Roadmaps give you a bird-eye view of everything that’s happening at your team or company.',
            'description_ar' => 'لكل فريق خطة واستراتيجية بناءً على ما يدفع إلى الأهداف التجارية. عندما تكون جاهزًا لتنفيذ الاستراتيجية، يمكن أن تفتح طريقك في إدارة التفاصيل اليومية والفرط الحاصل. ومن أجل الرفع فوق التفاصيل الدقيقة والفرط، فإن خرائط الطريق من أدوات التوجيه الأكثر استجابة. وتقدم خرائط الطريق لك نظرة عامة على كل ما يحدث في فريقك أو شركتك.',
            'cover' => 'https://th.bing.com/th/id/OIP.JP0Vr2KdlUi3srDkYKw-pwAAAA?w=212&h=156&c=7&r=0&o=5&dpr=1.4&pid=1.7',
        ]);

        Roadmap::create([
            'expert_id' => 1,
            'technology_level_id' => 2,
            'technology_id' => 5,
            'title' => 'Roadmap title',
            'title_ar' => 'عنوان خارطة الطريق',
            'description' => 'Roadmap Basics A roadmap is a strategic plan that defines a goal or desired outcome and includes the major steps or milestones needed to reach it. It also serves as a communication tool, a high-level document that helps articulate strategic thinking—the why—behind both the goal and the plan for getting there.',
            'description_ar' => 'أساسيات خريطة الطريق
تعد خريطة الطريق خطة استراتيجية تحدد هدفًا أو نتيجة مرغوبة وتتضمن الخطوات الرئيسية أو الأهداف الرئيسية اللازمة لتحقيقها. كما تعمل كأداة اتصال، وثيقة عالية المستوى تساعد في توضيح التفكير الاستراتيجي - السبب وراء كل من الهدف والخطة للوصول إليه.',
            'cover' => 'https://th.bing.com/th/id/OIP.A5-zvJIhGPhoDpDn8xi_cQHaEy?rs=1&pid=ImgDetMain',
        ]);
        Roadmap::create([
            'expert_id' => 1,
            'technology_level_id' => 2,
            'technology_id' => 5,
            'title' => 'Another Roadmap',
            'title_ar' => 'عنوان خارطة أخر',
            'description' => 'Every team has a plan and strategy built around doing what pushes the business goals forward. When you’re busy executing the strategy, you can get lost in day-to-day task management. A roadmap is one of the most effective tools for rising above the granular details and chaos. Roadmaps give you a bird-eye view of everything that’s happening at your team or company.',
            'description_ar' => 'لكل فريق خطة واستراتيجية بناءً على ما يدفع إلى الأهداف التجارية. عندما تكون جاهزًا لتنفيذ الاستراتيجية، يمكن أن تفتح طريقك في إدارة التفاصيل اليومية والفرط الحاصل. ومن أجل الرفع فوق التفاصيل الدقيقة والفرط، فإن خرائط الطريق من أدوات التوجيه الأكثر استجابة. وتقدم خرائط الطريق لك نظرة عامة على كل ما يحدث في فريقك أو شركتك.',
            'cover' => 'https://th.bing.com/th/id/OIP.JP0Vr2KdlUi3srDkYKw-pwAAAA?w=212&h=156&c=7&r=0&o=5&dpr=1.4&pid=1.7',
        ]);

        Roadmap::create([
            'expert_id' => 1,
            'technology_level_id' => 3,
            'technology_id' => 3,
            'title' => 'Roadmap title',
            'title_ar' => 'عنوان خارطة الطريق',
            'description' => 'Roadmap Basics A roadmap is a strategic plan that defines a goal or desired outcome and includes the major steps or milestones needed to reach it. It also serves as a communication tool, a high-level document that helps articulate strategic thinking—the why—behind both the goal and the plan for getting there.',
            'description_ar' => 'أساسيات خريطة الطريق
تعد خريطة الطريق خطة استراتيجية تحدد هدفًا أو نتيجة مرغوبة وتتضمن الخطوات الرئيسية أو الأهداف الرئيسية اللازمة لتحقيقها. كما تعمل كأداة اتصال، وثيقة عالية المستوى تساعد في توضيح التفكير الاستراتيجي - السبب وراء كل من الهدف والخطة للوصول إليه.',
            'cover' => 'https://th.bing.com/th/id/OIP.A5-zvJIhGPhoDpDn8xi_cQHaEy?rs=1&pid=ImgDetMain',
        ]);
        Roadmap::create([
            'expert_id' => 1,
            'technology_level_id' => 3,
            'technology_id' => 3,
            'title' => 'Another Roadmap',
            'title_ar' => 'عنوان خارطة أخر',
            'description' => 'Every team has a plan and strategy built around doing what pushes the business goals forward. When you’re busy executing the strategy, you can get lost in day-to-day task management. A roadmap is one of the most effective tools for rising above the granular details and chaos. Roadmaps give you a bird-eye view of everything that’s happening at your team or company.',
            'description_ar' => 'لكل فريق خطة واستراتيجية بناءً على ما يدفع إلى الأهداف التجارية. عندما تكون جاهزًا لتنفيذ الاستراتيجية، يمكن أن تفتح طريقك في إدارة التفاصيل اليومية والفرط الحاصل. ومن أجل الرفع فوق التفاصيل الدقيقة والفرط، فإن خرائط الطريق من أدوات التوجيه الأكثر استجابة. وتقدم خرائط الطريق لك نظرة عامة على كل ما يحدث في فريقك أو شركتك.',
            'cover' => 'https://th.bing.com/th/id/OIP.JP0Vr2KdlUi3srDkYKw-pwAAAA?w=212&h=156&c=7&r=0&o=5&dpr=1.4&pid=1.7',
        ]);



        Roadmap::create([
            'expert_id' => 2,
            'technology_level_id' => 1,
            'technology_id' => 2,
            'title' => 'Roadmap title',
            'title_ar' => 'عنوان خارطة الطريق',
            'description' => 'Roadmap Basics A roadmap is a strategic plan that defines a goal or desired outcome and includes the major steps or milestones needed to reach it. It also serves as a communication tool, a high-level document that helps articulate strategic thinking—the why—behind both the goal and the plan for getting there.',
            'description_ar' => 'أساسيات خريطة الطريق
تعد خريطة الطريق خطة استراتيجية تحدد هدفًا أو نتيجة مرغوبة وتتضمن الخطوات الرئيسية أو الأهداف الرئيسية اللازمة لتحقيقها. كما تعمل كأداة اتصال، وثيقة عالية المستوى تساعد في توضيح التفكير الاستراتيجي - السبب وراء كل من الهدف والخطة للوصول إليه.',
            'cover' => 'https://th.bing.com/th/id/OIP.A5-zvJIhGPhoDpDn8xi_cQHaEy?rs=1&pid=ImgDetMain',
        ]);
        Roadmap::create([
            'expert_id' => 2,
            'technology_level_id' => 1,
            'technology_id' => 2,
            'title' => 'Another Roadmap',
            'title_ar' => 'عنوان خارطة أخر',
            'description' => 'Every team has a plan and strategy built around doing what pushes the business goals forward. When you’re busy executing the strategy, you can get lost in day-to-day task management. A roadmap is one of the most effective tools for rising above the granular details and chaos. Roadmaps give you a bird-eye view of everything that’s happening at your team or company.',
            'description_ar' => 'لكل فريق خطة واستراتيجية بناءً على ما يدفع إلى الأهداف التجارية. عندما تكون جاهزًا لتنفيذ الاستراتيجية، يمكن أن تفتح طريقك في إدارة التفاصيل اليومية والفرط الحاصل. ومن أجل الرفع فوق التفاصيل الدقيقة والفرط، فإن خرائط الطريق من أدوات التوجيه الأكثر استجابة. وتقدم خرائط الطريق لك نظرة عامة على كل ما يحدث في فريقك أو شركتك.',
            'cover' => 'https://th.bing.com/th/id/OIP.JP0Vr2KdlUi3srDkYKw-pwAAAA?w=212&h=156&c=7&r=0&o=5&dpr=1.4&pid=1.7',
        ]);

        Roadmap::create([
            'expert_id' => 2,
            'technology_level_id' => 2,
            'technology_id' => 6,
            'title' => 'Roadmap title',
            'title_ar' => 'عنوان خارطة الطريق',
            'description' => 'Roadmap Basics A roadmap is a strategic plan that defines a goal or desired outcome and includes the major steps or milestones needed to reach it. It also serves as a communication tool, a high-level document that helps articulate strategic thinking—the why—behind both the goal and the plan for getting there.',
            'description_ar' => 'أساسيات خريطة الطريق
تعد خريطة الطريق خطة استراتيجية تحدد هدفًا أو نتيجة مرغوبة وتتضمن الخطوات الرئيسية أو الأهداف الرئيسية اللازمة لتحقيقها. كما تعمل كأداة اتصال، وثيقة عالية المستوى تساعد في توضيح التفكير الاستراتيجي - السبب وراء كل من الهدف والخطة للوصول إليه.',
            'cover' => 'https://th.bing.com/th/id/OIP.A5-zvJIhGPhoDpDn8xi_cQHaEy?rs=1&pid=ImgDetMain',
        ]);
        Roadmap::create([
            'expert_id' => 2,
            'technology_level_id' => 2,
            'technology_id' => 6,
            'title' => 'Another Roadmap',
            'title_ar' => 'عنوان خارطة أخر',
            'description' => 'Every team has a plan and strategy built around doing what pushes the business goals forward. When you’re busy executing the strategy, you can get lost in day-to-day task management. A roadmap is one of the most effective tools for rising above the granular details and chaos. Roadmaps give you a bird-eye view of everything that’s happening at your team or company.',
            'description_ar' => 'لكل فريق خطة واستراتيجية بناءً على ما يدفع إلى الأهداف التجارية. عندما تكون جاهزًا لتنفيذ الاستراتيجية، يمكن أن تفتح طريقك في إدارة التفاصيل اليومية والفرط الحاصل. ومن أجل الرفع فوق التفاصيل الدقيقة والفرط، فإن خرائط الطريق من أدوات التوجيه الأكثر استجابة. وتقدم خرائط الطريق لك نظرة عامة على كل ما يحدث في فريقك أو شركتك.',
            'cover' => 'https://th.bing.com/th/id/OIP.JP0Vr2KdlUi3srDkYKw-pwAAAA?w=212&h=156&c=7&r=0&o=5&dpr=1.4&pid=1.7',
        ]);

        Roadmap::create([
            'expert_id' => 2,
            'technology_level_id' => 3,
            'technology_id' => 6,
            'title' => 'Roadmap title',
            'title_ar' => 'عنوان خارطة الطريق',
            'description' => 'Roadmap Basics A roadmap is a strategic plan that defines a goal or desired outcome and includes the major steps or milestones needed to reach it. It also serves as a communication tool, a high-level document that helps articulate strategic thinking—the why—behind both the goal and the plan for getting there.',
            'description_ar' => 'أساسيات خريطة الطريق
تعد خريطة الطريق خطة استراتيجية تحدد هدفًا أو نتيجة مرغوبة وتتضمن الخطوات الرئيسية أو الأهداف الرئيسية اللازمة لتحقيقها. كما تعمل كأداة اتصال، وثيقة عالية المستوى تساعد في توضيح التفكير الاستراتيجي - السبب وراء كل من الهدف والخطة للوصول إليه.',
            'cover' => 'https://th.bing.com/th/id/OIP.A5-zvJIhGPhoDpDn8xi_cQHaEy?rs=1&pid=ImgDetMain',
        ]);
        Roadmap::create([
            'expert_id' => 2,
            'technology_level_id' => 3,
            'technology_id' => 6,
            'title' => 'Another Roadmap',
            'title_ar' => 'عنوان خارطة أخر',
            'description' => 'Every team has a plan and strategy built around doing what pushes the business goals forward. When you’re busy executing the strategy, you can get lost in day-to-day task management. A roadmap is one of the most effective tools for rising above the granular details and chaos. Roadmaps give you a bird-eye view of everything that’s happening at your team or company.',
            'description_ar' => 'لكل فريق خطة واستراتيجية بناءً على ما يدفع إلى الأهداف التجارية. عندما تكون جاهزًا لتنفيذ الاستراتيجية، يمكن أن تفتح طريقك في إدارة التفاصيل اليومية والفرط الحاصل. ومن أجل الرفع فوق التفاصيل الدقيقة والفرط، فإن خرائط الطريق من أدوات التوجيه الأكثر استجابة. وتقدم خرائط الطريق لك نظرة عامة على كل ما يحدث في فريقك أو شركتك.',
            'cover' => 'https://th.bing.com/th/id/OIP.JP0Vr2KdlUi3srDkYKw-pwAAAA?w=212&h=156&c=7&r=0&o=5&dpr=1.4&pid=1.7',
        ]);
    }
}
