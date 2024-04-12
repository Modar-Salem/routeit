<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    use HasFactory;

    protected $fillable = [
        'expert_id','technology_id', 'title', 'title_ar', 'description', 'description_ar', 'cover',
        'introductory_video', 'target_cv',
    ];

    public function expert() {
        return $this->belongsTo(Expert::class, 'expert_id');
    }

    public function technology() {
        return $this->belongsTo(Technology::class, 'technology_id');
    }

    public function skills() {
        return $this->hasMany(RoadmapSkill::class);
    }
}
