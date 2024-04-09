<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','password','image','bio'] ;

    public function roadmaps() {
        return $this->hasMany(Roadmap::class, 'expert_id');
    }
}
