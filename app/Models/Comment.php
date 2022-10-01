<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'news_id',
        'body',
    ];

    public function isLiked()
    {
        return $this->commentLikes()->where('user_id', Auth::id())->exists();
    }

    /*
    ** Relation -----------------------------------------------
    */

    public function news()
    {
        return $this->belongsTo(News::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function commentLikes() {
        return $this->belongsToMany(User::class, 'comment_likes', 'comment_id', 'user_id');
    }
}
