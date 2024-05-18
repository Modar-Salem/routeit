<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoadmapUsersRanking extends Model
{
    use HasFactory;

    protected $table = 'roadmap_users_rankings';
    protected $fillable = ['mobile_user_id', 'roadmap_id', 'userXP'];
}
