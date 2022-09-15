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

    protected $fillable = [
        'user_id',
        'news_id',
        'status',
    ];
    public function user(){
    return $this->belongsTo(User::class);
    }

    public function changeStatusForThumbsUp($like_user,$user_id,$news_id){
        if(empty($like_user)||$like_user->status==Reaction::BAD||$like_user->status==Reaction::DEFAULT){
            Reaction::updateOrCreate(
                ['user_id'=>$user_id,'news_id'=>$news_id],
                ['status'=>Reaction::GOOD]
            );
        } else {
            Reaction::updateOrCreate(
                ['user_id'=>$user_id,'news_id'=>$news_id],
                ['status'=>Reaction::DEFAULT]
            );
        }
    }
    public function changeStatusForThumbsDown($like_user,$user_id,$news_id){
        if(empty($like_user)||$like_user->status==Reaction::GOOD||$like_user->status==Reaction::DEFAULT){
            Reaction::updateOrCreate(
                ['user_id'=>$user_id,'news_id'=>$news_id],
                ['status'=>Reaction::BAD]
            );
        } else {
            Reaction::updateOrCreate(
                ['user_id'=>$user_id,'news_id'=>$news_id],
                ['status'=>Reaction::DEFAULT]
            );
        }
    }
}
