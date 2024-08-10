<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    use HasFactory;

    protected $fillable = ['competition_id', 'mobile_user_id', 'project_link'];

    public function mobileUser()
    {
        return $this->belongsTo(MobileUser::class, 'mobile_user_id');
    }

    public function winner()
    {
        return $this->hasOne(CompetitionWinner::class);
    }


    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
