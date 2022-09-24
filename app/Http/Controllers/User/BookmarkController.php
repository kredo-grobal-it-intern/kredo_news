<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function bookmark(Request $request)
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $news_id = $request->news_id;
        $bookmarks = $user->bookmarks;
        $bookmark = $bookmarks->filter(function ($bookmark) use ($user_id, $news_id) {
            return $bookmark->pivot->news_id == $news_id && $bookmark->pivot->user_id == $user_id;
        })->first();

        if (!$bookmark) {
            $user->bookmarks()->attach($news_id);
        } else {
            $user->bookmarks()->detach($news_id);
        }
        return response()->json();
    }
}
