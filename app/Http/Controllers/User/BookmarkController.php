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
        $user_id = $user->id;
        $news_id = $request->news_id;
        $bookmark = $user->bookmarks->filter(function ($bookmark) use ($user_id, $news_id) {
            return $bookmark->pivot->news_id == $news_id && $bookmark->pivot->user_id == $user_id;
        })->first();
        $bookmarks = $user->bookmarks();

        if (!$bookmark) {
            $bookmarks->attach($news_id);
        } else {
            $bookmarks->detach($news_id);
        }
        return response()->json();
    }
}
