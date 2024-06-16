<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    protected $table = 'comment_replies';
    protected $fillable = ['mobile_user_id', 'skill_comments_id', 'reply'];
}
