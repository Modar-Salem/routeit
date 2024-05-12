<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = ['technology_id', 'roadmap_skill_id', 'total_xp'];

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    // Relation with TestQuestion
    public function questions()
    {
        return $this->hasMany(TestQuestion::class);
    }

    public function roadmapSkill()
    {
        return $this->belongsTo(RoadmapSkill::class);
    }

    public function usersPassed()
    {
        return $this->belongsToMany(MobileUser::class, 'user_passed_tests');
    }
}
