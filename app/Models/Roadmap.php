<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    use HasFactory;

    protected $fillable = [
        'expert_id', 'technology_level_id', 'title', 'title_ar', 'description', 'description_ar', 'cover',
        'introductory_video', 'target_cv',
    ];

    public function expert()
    {
        return $this->belongsTo(Expert::class, 'expert_id');
    }

    public function level()
    {
        return $this->belongsTo(TechnologyLevel::class, 'technology_level_id');
    }

    public function skills()
    {
        return $this->hasMany(RoadmapSkill::class);
    }

    public function rankedUsers()
    {
        return $this->belongsToMany(MobileUser::class, 'roadmap_users_rankings')
            ->withPivot(['userXP']);
    }

    public function previousWeekRankedUsers()
    {
        return $this->belongsToMany(MobileUser::class, 'previous_week_roadmap_users_rankings')
            ->withPivot(['userXP']);
    }
}
