<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = ['technology_id', 'total_xp'];

    public function technology() {
        return $this->belongsTo(Technology::class);
    }

    // Relation with TestQuestion
    public function questions() {
        return $this->hasMany(TestQuestion::class);
    }
}
