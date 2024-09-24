<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationMobileUserPivot extends Model
{
    use HasFactory;

    protected $table = 'notification_mobile_user';
    protected $fillable = ['mobile_user_id', 'notification_id'];
}
