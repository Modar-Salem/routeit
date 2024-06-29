<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersFollowedTechnology extends Model
{
    use HasFactory;
    protected $table = 'users_followed_technologies';
    protected $fillable = ['mobile_user_id', 'technology_id'];
}
