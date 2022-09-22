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
        $user_id = Auth::user()->id;
        $follower_id = $request->user_id;
        $followed = Follow::withTrashed()->where('following_id', $user_id)->where('follower_id', $follower_id)->first();
        if (empty($followed)) {
            Follow::create([
                'following_id' => $user_id,
                'follower_id' => $follower_id
            ]);
        } elseif ($followed->trashed()) {
            $this->restore($user_id, $follower_id);
        } else {
            Follow::where('following_id', $user_id)->where('follower_id', $follower_id)->delete();
        }
        return response()->json();
    }
    public function restore($user_id, $follower_id)
    {
        Follow::onlyTrashed()->where('following_id', $user_id)->where('follower_id', $follower_id)->restore();
    }
}
