<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoadmapSkillArticle extends Model
{
    use HasFactory;
    protected $fillable = ['roadmap_skill_id', 'title'];

    public function skill() {
        return $this->belongsTo(RoadmapSkill::class, 'roadmap_skill_id');
    }
    public function sections()
    {
        return $this->hasMany(ArticleSection::class , 'article_id') ;
    }
}
