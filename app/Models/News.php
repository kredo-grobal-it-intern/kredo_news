<?php

namespace App\Models;

use App\Consts\SourceConst;
use App\Consts\ReactionConst;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;


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

    public static function getNewsBySource($source_id)
    {
        return News::withCount('comments')->with('bookmarks')->where('source_id', $source_id)->latest('published_at')->limit(5)->get();
    }

    public function getLike() {
        return $this->reactions->filter(function($reaction) {
            return $reaction->pivot->status == ReactionConst::LIKE;
        });
    }
    public function getDislike() {
        return $this->reactions->filter(function($reaction) {
            return $reaction->pivot->status == ReactionConst::DISLIKE;
        });
    }
    public function isLiked(){
        return $this->reactions()
            ->where('status',ReactionConst::LIKE)
            ->where('user_id',Auth::user()->id)
            ->exists();
    }
    public function isDisliked(){
        return $this->reactions()
            ->where('status',ReactionConst::DISLIKE)
            ->where('user_id',Auth::user()->id)
            ->exists();
    }

    public function isBookmarked(){
        return $this->bookmarks->contains(Auth::user());
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
            $result = News::withCount('comments')->with('bookmarks')->where('description', 'like', "%{$keyword}%")
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
        return News::where('source_id', $source_id)->withCount('comments')->with('bookmarks')->orderBy('comments_count', 'desc')->limit(5)->get();
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

    /*
    ** Relation -----------------------------------------------
    */

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

    public function bookmarks() {
        return $this->belongsToMany(User::class, 'bookmarks', 'news_id', 'user_id');
    }

    public function reactions(){
        return $this->belongsToMany(User::class, 'reactions', 'news_id', 'user_id')->withPivot('status');
    }
}
