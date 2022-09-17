<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function destroyFollower($follower_id)
    {
        Follow::where('follower_id', $follower_id)
                ->where('following_id', Auth::user()->id)
                ->delete();

        return redirect()->back();
    }

    public function destroyFollowing($following_id)
    {
        Follow::where('follower_id', Auth::user()->id)
                ->where('following_id', $following_id)
                ->delete();
        
        return redirect()->back();
    }
}
