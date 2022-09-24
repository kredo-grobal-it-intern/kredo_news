<?php

namespace App\Models;

use App\Consts\SourceConst;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;


class News extends Model
{
    use HasFactory, SoftDeletes;

    const LIKE = 1;
    const DISLIKE = 2;

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

    public static function getLatestNews($source_id)
    {
        return News::where('source_id', $source_id)->latest('published_at')->limit(1)->first();
    }

    public static function getNewsBySource($source_id)
    {
        return News::where('source_id', $source_id)->latest('published_at')->offset(1)->limit(4)->get();
    }
    public function reactions(){
        return $this->belongsToMany(News::class, 'reactions', 'news_id')->withPivot('status');
    }
    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }

    public function like_reactions() {
        return $this->reactions->filter(function($reaction) {
            return $reaction->pivot->status == self::LIKE;
        });
    }
    public function dislike_reactions() {
        return $this->reactions->filter(function($reaction) {
            return $reaction->pivot->status == self::DISLIKE;
        });
    }
    public function isUp(){
        return $this->reactions()
            ->where('status',Reaction::GOOD)
            ->where('user_id',Auth::user()->id)
            ->exists();
    }
    public function isDown(){
        return $this->reactions()
            ->where('status',Reaction::BAD)
            ->where('user_id',Auth::user()->id)
            ->exists();
    }
    public function isBookmarked(){
        return $this->bookmarks()
            ->where('user_id',Auth::user()->id)
            ->exists();
    }

    public static function pregSplit($keyword)
    {
        $keyword = mb_convert_kana( $keyword, "s" );
        return preg_split('/[\p{Z}\p{Cc}]++/u', $keyword, -1, PREG_SPLIT_NO_EMPTY);
    }

    public static function search($request)
    {
        $keywords = self::pregSplit($request->keyword);
        $searched_news_array = collect([]);
        foreach ($keywords as $keyword) {
            $result = News::where('description', 'like', "%{$keyword}%")
                ->orWhere('content', 'like',"%{$keyword}%")
                ->orWhere('title', 'like', "%{$keyword}%")
                ->latest('published_at')
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
            $searched_news_array = $searched_news_array->merge($result);
        }
        return $searched_news_array;
    }

    public static function getWhatsHotBySource($source_id)
    {
        return News::where('source_id', $source_id)->withCount('comments')->orderBy('comments_count', 'desc')->limit(5)->get();
    }

    public static function getWhatsHot()
    {
        $whats_hot_news = [
            'America' => News::getWhatsHotBySource(SourceConst::AMERICA),
            'Asia' => News::getWhatsHotBySource(SourceConst::ASIA),
            'Europe' => News::getWhatsHotBySource(SourceConst::EUROPE),
            'Africa' => News::getWhatsHotBySource(SourceConst::AFRICA),
            'Oceania' => News::getWhatsHotBySource(SourceConst::OCEANIA),
        ];
        return $whats_hot_news;
    }

    public static function getLatestNewsList($source_id)
    {
        return News::where('source_id', $source_id)->latest('published_at')->limit(5)->get();
    }

    public static function getTopGoodNewsList()
    {
        return News::withCount(['reactions' => function (Builder $query) {
                                $query->where('status', 1);
                                }])
                    ->orderBy('reactions_count', 'desc')
                    ->limit(5)
                    ->get();
    }

    public static function getWorstBadNewsList()
    {
        return News::withCount(['reactions' => function (Builder $query) {
                                $query->where('status', 2);
                                }])
                    ->orderBy('reactions_count', 'desc')
                    ->limit(5)
                    ->get();
    }

    public static function getTopBookmarkNewsList()
    {
        return News::withCount('bookmarks')->orderBy('bookmarks_count', 'desc')->limit(5)->get();
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function good()
    {
        return $this->hasMany(Reaction::class)->where('status', 1);
    }

    public function bad()
    {
        return $this->hasMany(Reaction::class)->where('status', 2);
    }

}
