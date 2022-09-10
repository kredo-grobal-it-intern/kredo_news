<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class News extends Model
{
    use HasFactory, SoftDeletes;

    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
    protected $fillable = [
        'country_id',
        'category_id',
        'source_id',
        'title',
        'description',
        'content',
        'author',
        'url',
        'image',
        'published_at',
    ];

    public static function getLatestArticle($source_id)
    {
        return News::where('source_id', '=', $source_id)->orderBy('published_at', 'desc')->limit(1)->first();
    }

    public static function getArticlesBySource($source_id)
    {
        return News::where('source_id', '=', $source_id)->orderBy('published_at', 'desc')->offset(1)->limit(4)->get();
    }
    public function reactions(){
        return $this->hasMany(Reaction::class);
    }
    public function like_reactions() {
        return $this->reactions->filter(function($reaction) {
            return $reaction->status == 1;
        });
    }
    public function dislike_reactions() {
        return $this->reactions->filter(function($reaction) {
            return $reaction->status == 2;
        });
    }
    public function isUp(){
        return $this->reactions()
        ->where('status',1)
        ->where('user_id',Auth::user()->id)
        ->exists();
    }
    public function isDown(){
        return $this->reactions()
            ->where('status',2)
            ->where('user_id',Auth::user()->id)
            ->exists();
    }
}
