<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileEmailVerificationCode extends Model
{
    use HasFactory;

    protected $table = 'mobile_email_verification_codes';
    protected $fillable = ['accountVerificationCode', 'user_id'];

    public function user()
    {
        return $this->belongsTo(MobileUser::class);
    }
}
