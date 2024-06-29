<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousWeekRoadmapUsersRanking extends Model
{
    use HasFactory;

    protected $table = 'previous_week_roadmap_users_rankings';
    protected $fillable = ['mobile_user_id', 'roadmap_id', 'userXP'];
}
