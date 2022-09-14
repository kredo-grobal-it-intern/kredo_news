<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class ReactionController extends Controller
{
    private $reaction;

    public function __construct(Reaction $reaction)
    {
        $this->reaction = $reaction;
    }

    public function thumbs_up(Request $request)
    {
        $user_id = Auth::user()->id;
        $news_id = $request->news_id;
        $news = News::findOrFail($news_id);
        $like_user = Reaction::where(['user_id' => $user_id, 'news_id' => $news_id])->first();

        $this->reaction->changeStatusForThumbsUp($like_user, $user_id, $news_id);

        $json = $this->countReactions($news);
        return response()->json($json);
    }
    public function thumbs_down(Request $request)
    {
        $user_id = Auth::user()->id;
        $news_id = $request->news_id;
        $news = News::findOrFail($news_id);
        $like_user = Reaction::where(['user_id' => $user_id, 'news_id' => $news_id])->first();

        $this->reaction->changeStatusForThumbsDown($like_user, $user_id, $news_id);

        $json = $this->countReactions($news);
        return response()->json($json);
    }
    private function countReactions($news)
    {
        $newsDislikesCount = $news->dislike_reactions()->count();
        $newsLikesCount = $news->like_reactions()->count();

        $json = [
            'newsDislikesCount' => $newsDislikesCount,
            'newsLikesCount' => $newsLikesCount,
        ];
        return $json;
    }
}
