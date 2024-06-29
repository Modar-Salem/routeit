<?php

namespace App\Models;

use App\Observers\TechnologyObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_ar', 'description', 'description_ar', 'image', 'videos', 'technology_category_id'];

    // Relation with TechnologyLevel
    public function levels()
    {
        return $this->hasMany(TechnologyLevel::class);
    }

    // Relation with Test
    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    // Relation with RoadMap
    public function roadmaps()
    {
        return $this->hasMany(Roadmap::class);
    }

    // Assuming Technology belongs to TechnologyCategory
    public function category()
    {
        return $this->belongsTo(TechnologyCategory::class, 'technology_category_id');
    }

    public function followingUsers()
    {
        return $this->belongsToMany(MobileUser::class, 'users_followed_technologies');
    }
}
