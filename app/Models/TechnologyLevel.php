<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologyLevel extends Model
{
    use HasFactory;
    protected $fillable = ['level', 'technology_id'];

    public function technology() {
        return $this->belongsTo(Technology::class);
    }
}
