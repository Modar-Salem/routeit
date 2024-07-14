<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersFollowedCompany extends Model
{
    use HasFactory;

    protected $table = 'users_followed_companies';
    protected $fillable = ['mobile_user_id', 'company_id'];
}
