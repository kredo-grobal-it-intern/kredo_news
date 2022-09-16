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
        $news_list = [
            'America' => [
                'latest' => News::getLatestNews(SourceConst::AMERICA),
                'list' => News::getNewsBySource(SourceConst::AMERICA),
            ],

            'Asia' => [
                'latest' => News::getLatestNews(SourceConst::ASIA),
                'list' => News::getNewsBySource(SourceConst::ASIA),
            ],

            'Europe' => [
                'latest' => News::getLatestNews(SourceConst::EUROPE),
                'list' => News::getNewsBySource(SourceConst::EUROPE),
            ],

            'Africa' => [
                'latest' => News::getLatestNews(SourceConst::AFRICA),
                'list' => News::getNewsBySource(SourceConst::AFRICA),
            ],

            'Oceania' => [
                'latest' => News::getLatestNews(SourceConst::OCEANIA),
                'list' => News::getNewsBySource(SourceConst::OCEANIA),
            ],
        ];
        $whats_hot_news = News::getWhatsHot();

        return view('user.news.index')
            ->with('news_list', $news_list)
            ->with('whats_hot_news', $whats_hot_news);
    }

    public function show($news_id)
    {
        $news = News::findOrFail($news_id);
        $whats_hot_news = News::getWhatsHotBySource($news->source_id);
        $latest_news = News::getLatestNewsList($news->source_id);
        $comments = Comment::where('news_id', '=', $news_id)->orderBy('created_at', 'desc')->get();
        return view('user.news.detail')
            ->with('news', $news)
            ->with('whats_hot_news', $whats_hot_news)
            ->with('latest_news', $latest_news)
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
        $news_count = $searched_news_array->count();
        $selected_category = Category::where('id', '=', $request->category)->first();
        $countries = $request->countries ?? [];
        $selected_countries = Country::whereIn('id', $countries)->get();

        return view('user.news.search')
            ->with('searched_news_array', $searched_news_array)
            ->with('news_count', $news_count)
            ->with('keyword', $request->keyword)
            ->with('selected_category', $selected_category)
            ->with('selected_countries', $selected_countries);
    }
}
