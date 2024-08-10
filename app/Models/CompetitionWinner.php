<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionWinner extends Model
{
    use HasFactory;

    protected $fillable = ['competition_id', 'competitor_id', 'rank'];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function competitor()
    {
        return $this->belongsTo(Competitor::class);
    }
}

