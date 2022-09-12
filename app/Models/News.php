<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public static function getLatestArticle($source_id)
    {
        return News::where('source_id', '=', $source_id)->orderBy('published_at', 'desc')->limit(1)->first();
    }

    public static function getArticlesBySource($source_id)
    {
        return News::where('source_id', '=', $source_id)->orderBy('published_at', 'desc')->offset(1)->limit(4)->get();
    }
}
