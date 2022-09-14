<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Models\Country;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $sources = [
        'CNN' => 1,
        'ASIA TIMES' => 2,
        'BBC' => 3,
        'africanews' => 4,
        'ABC' => 5,
    ];
    public function index()
    {
        $articles = [
            'America' => [
                'latest' => News::getLatestArticle($this->sources['CNN']),
                'sub' => News::getArticlesBySource($this->sources['CNN']),
            ],

            'Asia' => [
                'latest' => News::getLatestArticle($this->sources['ASIA TIMES']),
                'sub' => News::getArticlesBySource($this->sources['ASIA TIMES']),
            ],

            'Europe' => [
                'latest' => News::getLatestArticle($this->sources['BBC']),
                'sub' => News::getArticlesBySource($this->sources['BBC']),
            ],

            'Africa' => [
                'latest' => News::getLatestArticle($this->sources['africanews']),
                'sub' => News::getArticlesBySource($this->sources['africanews']),
            ],

            'Oceania' => [
                'latest' => News::getLatestArticle($this->sources['ABC']),
                'sub' => News::getArticlesBySource($this->sources['ABC']),
            ],
        ];
        return view('user.news.index')->with('articles', $articles);
    }

    public function show($news_id)
    {
        $news = News::findOrFail($news_id);
        $comments = Comment::where('news_id', '=', $news_id)->get();
        return view('user.news.detail')
            ->with('news', $news)
            ->with('comments', $comments);
    }
    public function filter()
    {
        // tentative method
        $all_news = News::all();
        return view('user.news.filter')
            ->with('all_news', $all_news);
    }

    public function showFavoritePage()
    {
        $all_news = News::all();
        $sources = Source::all();
        $country = Country::all();
        return view('user.news.favorite')->with('all_news', $all_news)->with('sources', $sources)->with('countries', $country);
    }

    public function showSearch(Request $request)
    {
        $request->validate([
            'keyword' => 'required|max:20'
        ]);

        $searched_news_array = News::search($request);
        $article_count = $searched_news_array->count();
        $selected_category = Category::where('id', '=', $request->category)->first();
        $countries = $request->countries ?? [];
        $selected_countries = Country::whereIn('id', $countries)->get();

        return view('user.news.search')
            ->with('searched_news_array', $searched_news_array)
            ->with('article_count', $article_count)
            ->with('keyword', $request->keyword)
            ->with('selected_category', $selected_category)
            ->with('selected_countries', $selected_countries);
    }
}
