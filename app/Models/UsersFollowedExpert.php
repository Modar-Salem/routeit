<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersFollowedExpert extends Model
{
    use HasFactory;

    protected $table = 'users_followed_experts';
    protected $fillable = ['mobile_user_id', 'expert_id'];
}
