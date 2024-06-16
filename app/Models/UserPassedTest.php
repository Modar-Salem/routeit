<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPassedTest extends Model
{
    use HasFactory;

    protected $table = 'user_passed_tests';
    protected $fillable = ['mobile_user_id', 'test_id', 'isPassed'];
}
