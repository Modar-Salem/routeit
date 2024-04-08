<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_id', 'question', 'option1', 'option2', 'option3', 'option4', 'option5', 'correct_option', 'xp',
    ];

    public function test() {
        return $this->belongsTo(Test::class);
    }
}
