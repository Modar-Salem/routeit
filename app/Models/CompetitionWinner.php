<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionWinner extends Model
{
    use HasFactory;

    protected $fillable = ['competitor_id', 'rank'];

    public function competitor()
    {
        return $this->belongsTo(Competitor::class);
    }
}
