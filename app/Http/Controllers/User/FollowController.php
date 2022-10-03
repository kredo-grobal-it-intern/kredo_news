<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(Request $request)
    {
        $following_id = $request->user_id;
        $user = User::find($following_id);
        if (!$user->isFollowed()) {
            Auth::user()->followings()->attach($following_id);
        }

        $param = User::getFollowCountForJson($user);
        return response()->json($param);
    }

    public function unfollow(Request $request)
    {
        $following_id = $request->user_id;
        $user = User::find($following_id);
        Auth::user()->followings()->detach($following_id);

        $param = User::getFollowCountForJson($user);
        return response()->json($param);
    }
}
