<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoadmapSkillArticle extends Model
{
    use HasFactory;
    protected $fillable = ['roadmap_skill_id', 'article', 'image'];

    public function skill() {
        return $this->belongsTo(RoadmapSkill::class, 'roadmap_skill_id');
    }
}
