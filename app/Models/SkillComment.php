<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillComment extends Model
{
    use HasFactory;

    protected $table = 'skill_comments';
    protected $fillable = ['mobile_user_id', 'roadmap_skill_id', 'comment'];

    public function mobileUsersHaveReplies() {
        return $this->belongsToMany(MobileUser::class, 'comment_replies');
    }
}
