<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookmarkController extends Controller
{
    public function bookmark(Request $request)
    {
        $user = Auth::user();
        $news_id = $request->news_id;
        $bookmark = DB::table('bookmarks')->where('user_id', $user->id)->where('news_id', $news_id)->first();
        if (!$bookmark) {
            $user->bookmarks()->attach($news_id);
        } else {
            $user->bookmarks()->detach($news_id);
        }
        return response()->json();
    }
}
