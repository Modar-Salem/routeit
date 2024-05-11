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
        'it_student', 'university', 'bio',
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

    public function skillComments()
    {
        return $this->belongsToMany(RoadmapSkill::class, 'skill_comments');
    }

    public function commentReplies()
    {
        return $this->belongsToMany(SkillComment::class, 'comment_replies');
    }
}
