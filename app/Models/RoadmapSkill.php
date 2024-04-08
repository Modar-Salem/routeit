<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoadmapSkill extends Model
{
    use HasFactory;
    protected $fillable = ['roadmap_id', 'title'];

    public function roadmap() {
        return $this->belongsTo(Roadmap::class);
    }

    // Relation with RoadmapSkillVideo
    public function videos() {
        return $this->hasMany(RoadmapSkillVideo::class);
    }

    // Relation with RoadmapSkillArticle
    public function articles() {
        return $this->hasMany(RoadmapSkillArticle::class);
    }
}
