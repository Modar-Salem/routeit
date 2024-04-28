<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileResetPasswordCode extends Model
{
    use HasFactory;

    protected $table = 'mobile_reset_password_codes';
    protected $fillable = ['resetPasswordCode', 'user_id'];

    public function user()
    {
        return $this->belongsTo(MobileUser::class);
    }
}
