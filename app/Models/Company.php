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

    public function followingUsers()
    {
        return $this->belongsToMany(MobileUser::class, 'users_followed_companies');
    }
}
