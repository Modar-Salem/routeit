<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkillComment extends Model
{
    use HasFactory;

    protected $table = 'user_skill_comments';
    protected $fillable = ['user_skill_comment_id', 'user_skill_comment_type', 'roadmap_skill_id', 'comment'];

    public function mobileUsers()
    {
        return $this->morphedByMany(MobileUser::class, 'user_skill_commentables');
    }

    public function experts()
    {
        return $this->morphedByMany(Expert::class, 'user_skill_commentables');
    }

    public function mobileUsersHaveReplies()
    {
        return $this->belongsToMany(MobileUser::class, 'comment_replies');
    }
}
