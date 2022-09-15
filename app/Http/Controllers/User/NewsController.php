<?php

namespace App\Http\Controllers\User;

use App\Consts\SourceConst;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\Source;
use App\Models\Country;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $articles = [
            'America' => [
                'latest' => News::getLatestArticle(SourceConst::AMERICA),
                'sub' => News::getArticlesBySource(SourceConst::AMERICA),
            ],

            'Asia' => [
                'latest' => News::getLatestArticle(SourceConst::ASIA),
                'sub' => News::getArticlesBySource(SourceConst::ASIA),
            ],

            'Europe' => [
                'latest' => News::getLatestArticle(SourceConst::EUROPE),
                'sub' => News::getArticlesBySource(SourceConst::EUROPE),
            ],

            'Africa' => [
                'latest' => News::getLatestArticle(SourceConst::AFRICA),
                'sub' => News::getArticlesBySource(SourceConst::AFRICA),
            ],

            'Oceania' => [
                'latest' => News::getLatestArticle(SourceConst::OCEANIA),
                'sub' => News::getArticlesBySource(SourceConst::OCEANIA),
            ],
        ];
        $whats_hot_articles = News::getWhatsHot();

        return view('user.news.index')
            ->with('articles', $articles)
            ->with('whats_hot_articles', $whats_hot_articles);
    }

    public function show($news_id)
    {
        $news = News::findOrFail($news_id);
        $whats_hot_articles = News::getWhatsHotBySource($news->source_id);
        $comments = Comment::where('news_id', '=', $news_id)->get();
        return view('user.news.detail')
            ->with('news', $news)
            ->with('whats_hot_articles', $whats_hot_articles)
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
