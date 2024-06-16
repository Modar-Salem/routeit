<?php

namespace Database\Seeders;

use App\Models\SkillComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SkillComment::create([
            'mobile_user_id' => 1,
            'roadmap_skill_id' => 1,
            'comment' => 'First Comment, OK?'
        ]);
        SkillComment::create([
            'mobile_user_id' => 1,
            'roadmap_skill_id' => 1,
            'comment' => 'Second Comment, OK?'
        ]);
        SkillComment::create([
            'mobile_user_id' => 1,
            'roadmap_skill_id' => 1,
            'comment' => 'Large Comment, In addition to customizing the name of the intermediate table, you may also customize the column names of the keys on the table by passing additional arguments to the belongsToMany method. The third argument is the foreign key name of the model on which you are defining the relationship, while the fourth argument is the foreign key name of the model that you are joining to, To define the "inverse" of a many-to-many relationship, you should define a method on the related model which also returns the result of the belongsToMany method. To complete our user / role example, lets define the users method on the Role model. As you have already learned, working with many-to-many relations requires the presence of an intermediate table. Eloquent provides some very helpful ways of interacting with this table. For example, lets assume our User model has many Role models that it is related to. After accessing this relationship, we may access the intermediate table using the pivot attribute on the models As noted previously, attributes from the intermediate table may be accessed on models via the pivot attribute. However, you are free to customize the name of this attribute to better reflect its purpose within your application.
For example, if your application contains users that may subscribe to podcasts, you likely have a many-to-many relationship between users and podcasts. If this is the case, you may wish to rename your intermediate table attribute to subscription instead of pivot. This can be done using the as method when defining the relationship:'
        ]);
        SkillComment::create([
            'mobile_user_id' => 2,
            'roadmap_skill_id' => 1,
            'comment' => 'Comment from another user. That\'s enough, isn\'t it?!'
        ]);
    }
}
