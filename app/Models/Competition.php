<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'name', 'start_date', 'end_date', 'description' , 'image'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function mobile_users()
    {
        return $this->belongsToMany(MobileUser::class, 'competitors');
    }
    public function winners()
    {
        return $this->hasMany(CompetitionWinner::class);
    }

    public function competitors()
    {
        return $this->hasMany(Competitor::class ,'competition_id' ) ;
    }

}
