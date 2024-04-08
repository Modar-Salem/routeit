<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    use HasFactory;

    protected $fillable = [
        'publisher_id', 'title', 'title_ar', 'description', 'description_ar', 'cover',
        'introductory_video', 'target_cv',
    ];

    public function publisher() {
        return $this->belongsTo(MobileUser::class, 'publisher_id');
    }

    // Relation with RoadmapSkill
    public function skills() {
        return $this->hasMany(RoadmapSkill::class);
    }
}
