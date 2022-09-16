<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function destroyFollower($follower_id)
    {
        $follower = Follow::where('follower_id', $follower_id)
                        ->where('following_id', Auth::user()->id);
        
        $follower->delete();
        return redirect()->back();
    }

    public function destroyFollowing($following_id)
    {
        $following = Follow::where('follower_id', Auth::user()->id)
                        ->where('following_id', $following_id);
        
        $following->delete();
        return redirect()->back();
    }
}
