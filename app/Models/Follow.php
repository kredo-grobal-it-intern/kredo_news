<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    public function userFollower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    public function userFollowing()
    {
        return $this->belongsTo(User::class, 'following_id');
    }
}