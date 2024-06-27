<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'company_id', 'start_date', 'end_date', 'description'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function mobile_users()
    {
        return $this->belongsToMany(MobileUser::class, 'competitors');
    }
}
