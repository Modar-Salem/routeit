<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'name_ar', 'description', 'description_ar', 'image', 'videos'];

    // Relation with TechnologyLevel
    public function levels() {
        return $this->hasMany(TechnologyLevel::class);
    }

    // Relation with Test
    public function tests() {
        return $this->hasMany(Test::class);
    }

    // Assuming Technology belongs to TechnologyCategory
    public function category() {
        return $this->belongsTo(TechnologyCategory::class);
    }
}
