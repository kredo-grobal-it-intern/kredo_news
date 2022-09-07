<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Source;
use App\Models\Country;

class NewsController extends Controller
{
    public function index()
    {
        $articles = [
            'America' => [
                'latest' => $this->getLatestArticle(1),
                'sub' => $this->getArticlesBySource(1),
            ],

            'Asia' => [
                'latest' => $this->getLatestArticle(2),
                'sub' => $this->getArticlesBySource(2),
            ],

            'Europe' => [
                'latest' => $this->getLatestArticle(3),
                'sub' => $this->getArticlesBySource(3),
            ],

            'Africa' => [
                'latest' => $this->getLatestArticle(4),
                'sub' => $this->getArticlesBySource(4),
            ],
            
            'Oceania' => [
                'latest' => $this->getLatestArticle(5),
                'sub' => $this->getArticlesBySource(5),
            ],
        ];
        // dd($articles['america']['latest']);
        return view('user.news.index')->with('articles', $articles);
    }

    public function getLatestArticle($source_id)
    {
        return News::where('source_id', '=', $source_id)->orderBy('published_at', 'desc')->limit(1)->first();
    }

    public function getArticlesBySource($source_id)
    {
        return News::where('source_id', '=', $source_id)->orderBy('published_at', 'desc')->offset(1)->limit(4)->get();
    }

    public function show($news_id)
    {
        $news = News::findOrFail($news_id);
        return view('user.news.detail')
            ->with('news', $news);
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

    public function showNonUser()
    {
        $country = Country::all();
        return view('user.news.non_user')->with('countries', $country);
    }

    public function showSearch()
    {
        $all_news = News::all();
        return view('user.news.search')->with('all_news', $all_news);
    }
}
