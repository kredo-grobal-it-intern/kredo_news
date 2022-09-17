<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    const DEFAULT = 0;
    const GOOD = 1;
    const BAD = 2;

    protected $fillable = [
        'user_id',
        'news_id',
        'status',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }

    public function user(){
    return $this->belongsTo(User::class);
    }

    public function changeStatus($like_user, $user_id, $news_id, $status)
    {
        if (empty($like_user) || $like_user->status != $status) {
            Reaction::updateOrCreate(
                ['user_id' => $user_id, 'news_id' => $news_id],
                ['status' => $status]
            );
        } else {
            Reaction::updateOrCreate(
                ['user_id' => $user_id, 'news_id' => $news_id],
                ['status' => Reaction::DEFAULT]
            );
        }
    }
}
