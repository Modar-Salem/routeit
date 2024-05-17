<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCommentReply extends Model
{
    use HasFactory;

    protected $table = 'user_comment_replies';
    protected $fillable = ['skill_comment_id', 'reply'];

    public function mobileUsers()
    {
        return $this->morphedByMany(MobileUser::class, 'user_comment_repliesables');
    }

    public function experts()
    {
        return $this->morphedByMany(Expert::class, 'user_comment_repliesables');
    }
}
