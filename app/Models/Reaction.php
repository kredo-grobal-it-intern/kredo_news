<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    const DEFAULT=0;
    const GOOD=1;
    const BAD=2;

    public function user(){
    return $this->belongsTo(User::class);
    }

    public function changeStatusForThumbsUp($user_id,$news_id,$like_user){
        if($like_user->status==Reaction::DEFAULT||$like_user->status==Reaction::BAD){
            Reaction::where(['user_id'=>$user_id,'news_id'=>$news_id])->update([
            'status'=>Reaction::GOOD
            ]);
        }elseif($like_user->status==Reaction::GOOD){
            Reaction::where(['user_id'=>$user_id,'news_id'=>$news_id])->update([
            'status'=>Reaction::DEFAULT
            ]);
        }
    }
    public function changeStatusForThumbsDown($user_id,$news_id,$like_user){
        if($like_user->status==Reaction::DEFAULT||$like_user->status==Reaction::GOOD){
            Reaction::where(['user_id'=>$user_id,'news_id'=>$news_id])->update([
                'status'=>Reaction::BAD
            ]);
        }elseif($like_user->status==Reaction::BAD){
            Reaction::where(['user_id'=>$user_id,'news_id'=>$news_id])->update([
                'status'=>Reaction::DEFAULT
            ]);
        }
    }
    public function store($user_id,$news_id,$status){
        return $this->save([
            'user_id'=>$user_id,
            'news_id'=>$news_id,
            'status'=>$status,
        ]);
    }
}
