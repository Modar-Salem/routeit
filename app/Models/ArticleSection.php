<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id' ,
        'title' ,
        'content',
        'image'
    ];

    public function roadmapSkillArticle()
    {
        return $this->belongsTo(RoadmapSkillArticle::class   , 'article_id') ;
    }

}
