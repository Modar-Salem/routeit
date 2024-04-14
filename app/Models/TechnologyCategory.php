<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologyCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_ar', 'description', 'description_ar', 'image'];

    // Assuming a one-to-many relationship with Technology
    public function technologies()
    {
        return $this->hasMany(Technology::class);
    }
}
