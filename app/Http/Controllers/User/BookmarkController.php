<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function bookmark(Request $request)
    {
        $user_id = Auth::user()->id;
        $news_id = $request->news_id;
        $bookmarked = Bookmark::withTrashed()->where('user_id', $user_id)->where('news_id', $news_id)->first();
        if (empty($bookmarked)) {
            Bookmark::create(
                [
                    'user_id' => $user_id,
                    'news_id' => $news_id,
                ]
            );
        } elseif ($bookmarked->trashed()) {
            $this->restore($user_id, $news_id);
        } else {
            Bookmark::where('news_id', $news_id)->where('user_id', $user_id)->delete();
        }
        return response()->json();
    }
    public function restore($user_id, $news_id)
    {
        Bookmark::onlyTrashed()->where('user_id', $user_id)->where('news_id', $news_id)->restore();
    }
}
