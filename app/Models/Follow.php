<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Follow extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'following_id',
        'follower_id',
    ];

    public static function isFollowed($user_id) {
        return Follow::where('follower_id', Auth::user()->id)->where('following_id', $user_id)->exists();
    }
}
