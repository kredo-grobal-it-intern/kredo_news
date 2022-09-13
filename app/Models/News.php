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

    public static function getLatestArticle($source_id)
    {
        return News::where('source_id', '=', $source_id)->orderBy('published_at', 'desc')->limit(1)->first();
    }

    public static function getArticlesBySource($source_id)
    {
        return News::where('source_id', '=', $source_id)->orderBy('published_at', 'desc')->offset(1)->limit(4)->get();
    }

    public static function pregSplit($keyword)
    {
        $keyword = mb_convert_kana( $keyword, "s" );
        return preg_split('/[\p{Z}\p{Cc}]++/u', $keyword, -1, PREG_SPLIT_NO_EMPTY);
    }

    public static function search($request)
    {
        $keywords = self::pregSplit($request->keyword);
        $searched_news_array = [];
        foreach ($keywords as $keyword) {
            $searched_news_array[] = News::where('description', 'like', "%{$keyword}%")
                ->orWhere('content', 'like',"%{$keyword}%")
                ->orWhere('title', 'like', "%{$keyword}%")
                ->get()
                ->filter(function ($news) use ($request) {
                    if (isset($request->countries) && isset($request->category)) {
                        return in_array($news->country_id, $request->countries) && $news->category_id == $request->category;
                    } elseif (isset($request->countries)) {
                        return in_array($news->country_id, $request->countries);
                    } elseif (isset($request->category)) {
                        return $news->category_id == $request->category;
                    } else {
                        return true;
                    }
                });
        }
        return $searched_news_array;
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
