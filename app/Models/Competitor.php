<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    use HasFactory;

    protected $fillable = ['competition_id', 'mobile_user_id', 'project_link'];

    public function Winner()
    {
        return $this->hasOne(CompetitionWinner::class);
    }
}
