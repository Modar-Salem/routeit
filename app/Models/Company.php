<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'location', 'image', 'description'];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function competitions()
    {
        return $this->hasMany(Competition::class);
    }
}
