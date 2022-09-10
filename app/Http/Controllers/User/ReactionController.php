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
        $this->reaction=$reaction;
    }

    public function thumbs_up(Request $request){
        $user_id =Auth::user()->id;
        $news_id=$request->news_id;
        $news=News::findOrFail($news_id);
        $like_user=Reaction::where(['user_id'=>$user_id,'news_id'=>$news_id])->first();
        if(!isset($like_user->status)){
            $this->reaction->user_id =Auth::user()->id;
            $this->reaction->news_id=$news_id;
            $this->reaction->status=1;
            $this->reaction->save();
        }else{
            if($like_user->status==0||$like_user->status==2){
                Reaction::where(['user_id'=>$user_id,'news_id'=>$news_id])->update([
                'status'=>1
                ]);
            }elseif($like_user->status==1){
                Reaction::where(['user_id'=>$user_id,'news_id'=>$news_id])->update([
                'status'=>0
            ]);
        }
    }
    $newsLikesCount=$news->like_reactions()->count();
    $newsDislikesCount=$news->dislike_reactions()->count();
        $json=[
            'newsLikesCount'=>$newsLikesCount,
            'newsDislikesCount'=>$newsDislikesCount,
        ];
        return response()->json($json);
    }
    public function thumbs_down(Request $request){
        $user_id =Auth::user()->id;
        $news_id=$request->news_id;
        $news=News::findOrFail($news_id);
        $like_user=Reaction::where(['user_id'=>$user_id,'news_id'=>$news_id])->first();
        if(!isset($like_user->status)){
            $this->reaction->user_id =Auth::user()->id;
            $this->reaction->news_id=$news_id;
            $this->reaction->status=2;
            $this->reaction->save();
        }else{
            if($like_user->status==0||$like_user->status==1){
                Reaction::where(['user_id'=>$user_id,'news_id'=>$news_id])->update([
                    'status'=>2
                ]);
        }elseif($like_user->status==2){
            Reaction::where(['user_id'=>$user_id,'news_id'=>$news_id])->update([
                'status'=>0
            ]);
        }
    }
    $newsDislikesCount=$news->dislike_reactions()->count();
    $newsLikesCount=$news->like_reactions()->count();

    $json=[
        'newsDislikesCount'=>$newsDislikesCount,
        'newsLikesCount'=>$newsLikesCount,
    ];
    return response()->json($json);
    }
}
