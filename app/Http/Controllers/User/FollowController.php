<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;

class FollowController extends Controller
{
    public function follow(Request $request)
    {
        $follower_id = Auth::user()->id;
        $following_id = $request->user_id;
        $is_followed = Follow::withTrashed()->where('following_id', $following_id)->where('follower_id', $follower_id)->first();
        if (empty($is_followed)) {
            Follow::create([
                'following_id' => $following_id,
                'follower_id' => $follower_id
            ]);
        } elseif ($is_followed->trashed()) {
            $this->restore($following_id, $follower_id);
        }
        return response()->json();
    }

    public function unfollow(Request $request)
    {
        $follower_id = Auth::user()->id;
        $following_id = $request->user_id;
        Follow::where('following_id', $following_id)->where('follower_id', $follower_id)->delete();
        return response()->json();
    }

    public function restore($following_id, $follower_id)
    {
        Follow::onlyTrashed()->where('following_id', $following_id)->where('follower_id', $follower_id)->restore();
    }
}
