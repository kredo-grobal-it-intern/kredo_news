<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function follow(Request $request)
    {
        $follower_id = Auth::id();
        $following_id = $request->user_id;
        $user = User::find($following_id);
        if (!$user->isFollowed()) {
            DB::table('follows')->insert([
                'following_id' => $following_id,
                'follower_id' => $follower_id
            ]);
        }

        $param = User::getFollowCountForJson(Auth::user(), $user);
        return response()->json($param);
    }

    public function unfollow(Request $request)
    {
        $follower_id = Auth::id();
        $following_id = $request->user_id;
        $user = User::find($following_id);
        DB::table('follows')->where('following_id', $following_id)->where('follower_id', $follower_id)->delete();
        
        $param = User::getFollowCountForJson(Auth::user(), $user);
        return response()->json($param);
    }
}
