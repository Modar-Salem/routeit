<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoadmapSkillVideo extends Model
{
    use HasFactory;
    protected $fillable = ['roadmap_skill_id', 'title', 'video'];

    public function skill() {
        return $this->belongsTo(RoadmapSkill::class, 'roadmap_skill_id');
    }
}
