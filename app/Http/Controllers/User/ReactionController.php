<?php

namespace App\Http\Controllers\User;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public static function isDefault($user_id, $news_id, $status)
    {
        return DB::table('reactions')
            ->where('user_id', $user_id)
            ->where('news_id', $news_id)
            ->where('status', $status)->exists();
    }

    public function thumbs_up(Request $request)
    {
        $user_id = Auth::id();
        $news_id = $request->news_id;
        $news = News::findOrFail($news_id);
        
        $status = self::isDefault($user_id, $news_id, 1) ? 0 : 1;
        DB::table('reactions')->updateOrInsert(
            [
                'user_id' => $user_id,
                'news_id' => $news_id
            ],
            ['status' => $status]
        );

        $json = $this->countReactions($news);
        return response()->json($json);
    }
    public function thumbs_down(Request $request)
    {
        $user_id = Auth::id();
        $news_id = $request->news_id;
        $news = News::findOrFail($news_id);

        $status = self::isDefault($user_id, $news_id, 2) ? 0 : 2;
        DB::table('reactions')->updateOrInsert(
            [
                'user_id' => $user_id,
                'news_id' => $news_id,
            ],
            ['status' => $status]
        );

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
