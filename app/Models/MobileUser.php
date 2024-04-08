<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MobileUser extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'email', 'password', 'verify', 'name', 'image', 'birth_date',
        'it_student', 'university', 'bio',
    ];

    // Relation with Roadmap
    public function roadmaps() {
        return $this->hasMany(Roadmap::class, 'publisher_id');
    }

    // Assuming MobileUser can have multiple technologies through tests
    public function technologies() {
        return $this->hasManyThrough(Technology::class, Test::class);
    }
}
