<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

;

class MobileUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'email', 'password', 'verify', 'completed', 'name', 'image', 'birth_date',
        'it_student', 'university', 'bio', 'userXP'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function emailVerificationCode()
    {
        return $this->hasOne(MobileEmailVerificationCode::class, 'user_id');
    }

    public function resetPasswordCode()
    {
        return $this->hasOne(MobileResetPasswordCode::class, 'user_id');
    }

    // Assuming MobileUser can have multiple technologies through tests
    public function technologies()
    {
        return $this->hasManyThrough(Technology::class, Test::class);
    }

    public function comments()
    {
        return $this->morphToMany(UserSkillComment::class, 'user_skill_commentables');
    }

    public function commentReplies()
    {
        return $this->morphToMany(UserCommentReply::class, 'user_comment_repliesables');
    }

    public function passedTests()
    {
        return $this->belongsToMany(Test::class, 'user_passed_tests');
    }

    public function roadmapsUserRanking()
    {
        return $this->belongsToMany(Roadmap::class, 'roadmap_users_rankings')
            ->withPivot(['userXP']);
    }

    public function previousWeekRoadmapsUserRanking()
    {
        return $this->belongsToMany(Roadmap::class, 'previous_week_roadmap_users_rankings')
            ->withPivot(['userXP']);
    }

    public function followedExperts()
    {
        return $this->belongsToMany(Expert::class, 'users_followed_experts');
    }

    public function followedTechnologies()
    {
        return $this->belongsToMany(Technology::class, 'users_followed_technologies');
    }
}
