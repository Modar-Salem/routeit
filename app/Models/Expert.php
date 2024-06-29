<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Expert extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name','email','password','image','bio','type'] ;

    public function roadmaps()
    {
        return $this->hasMany(Roadmap::class, 'expert_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function comments()
    {
        return $this->morphToMany(UserSkillComment::class, 'user_skill_commentables');
    }

    public function commentReplies()
    {
        return $this->morphToMany(UserCommentReply::class, 'user_comment_repliesables');
    }

    public function followingUsers()
    {
        return $this->belongsToMany(MobileUser::class, 'users_followed_experts');
    }
}
