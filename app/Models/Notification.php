<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = ['notification'];

    public function notified_mobile_users()
    {
        return $this->belongsToMany(MobileUser::class, 'notification_mobile_user');
    }
}
