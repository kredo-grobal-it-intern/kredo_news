<?php

namespace App\Http\Controllers\User;

use App\Models\News;
use App\Models\Source;
use App\Models\Country;
use App\Models\Category;
use App\Consts\SourceConst;
use App\Consts\NewsStatusConst;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        // Optimize later to get the news that is latest('post_date' and 'post_time)

                // $news = News::whereIn('id', function ($query) {
                //     $query->select(DB::raw('max(id) from news group by source_id'));
                // })->get();  //this max is can chose the latest news each of source id//

        $news_list = [
            'America' => [
                
                // Optimize later to get the news that is latest('post_date' and 'post_time)
                        // 'latest' => $news->filter(function ($latest) {
                        //     return $latest->source_id == SourceConst::AMERICA;
                        // })->first(), // (firstr)You get the first news form result of the filter
                'latest' => News::getLatestNews(SourceConst::AMERICA),
                'list' => News::getNewsBySource(SourceConst::AMERICA),
            ],

            'Asia' => [
                        // 'latest' => $news->filter(function ($latest) {
                        //     return $latest->source_id == SourceConst::ASIA;
                        // })->first(),
                'latest' => News::getLatestNews(SourceConst::ASIA),
                'list' => News::getNewsBySource(SourceConst::ASIA),
            ],

            'Europe' => [
                        // 'latest' => $news->filter(function ($latest) {
                        //     return $latest->source_id == SourceConst::EUROPE;
                        // })->first(),
                'latest' => News::getLatestNews(SourceConst::EUROPE),
                'list' => News::getNewsBySource(SourceConst::EUROPE),
            ],

            'Africa' => [
                        // 'latest' => $news->filter(function ($latest) {
                        //     return $latest->source_id == SourceConst::AFRICA;
                        // })->first(),
                'latest' => News::getLatestNews(SourceConst::AFRICA),
                'list' => News::getNewsBySource(SourceConst::AFRICA),
            ],

            'Oceania' => [
                        // 'latest' => $news->filter(function ($latest) {
                        //     return $latest->source_id == SourceConst::OCEANIA;
                        // })->first(),
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
        return view('user.news.detail')
            ->with('news', $news)
            ->with('whats_hot_news', $whats_hot_news)
            ->with('latest_news', $latest_news);
    }

    public function showAllComments($news_id)
    {
        $news = News::findOrFail($news_id);
        $whats_hot_news = News::getWhatsHotBySource($news->source_id);
        $latest_news = News::getLatestNewsList($news->source_id);
        return view('user.news.detail_all_comments')
            ->with('news', $news)
            ->with('whats_hot_news', $whats_hot_news)
            ->with('latest_news', $latest_news);
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
        $user = Auth::user();
        $sources = $user->favoriteSources;
        $countries = $user->favoriteCountries;
        if (!$countries->count() && !$sources->count()) {
            session()->flash('favorite_none', 'Please add favorite before visiting this page.');
            $favorite_news = collect();
        } else {
            $favorite_news = News::whereIn('source_id', $sources->pluck('id'))
            ->orWhereIn('country_id', $countries->pluck('id'))->get();
        }
        return view('user.news.favorite')->with('favorite_news', $favorite_news)->with('sources', $sources)->with('countries', $countries);
    }

    public function showFavoritePageByCountry(Country $country)
    {
        $user = Auth::user();
        $sources = $user->favoriteSources;
        $countries = $user->favoriteCountries;
        $favorite_news = News::where('country_id', $country->id)->get();
        return view('user.news.favorite')
            ->with('favorite_news', $favorite_news)
            ->with('sources', $sources)
            ->with('countries', $countries)
            ->with('selected_country', $country->id);
    }

    public function showFavoritePageBySource(Source $source)
    {
        $user = Auth::user();
        $sources = $user->favoriteSources;
        $countries = $user->favoriteCountries;
        $favorite_news = News::where('source_id', $source->id)->where('status', NewsStatusConst::PUBLISHED)->get();
        return view('user.news.favorite')
            ->with('favorite_news', $favorite_news)
            ->with('sources', $sources)
            ->with('countries', $countries)
            ->with('selected_source', $source->id);
    }

    public function showSearch(Request $request)
    {
        $request->validate([
            'keyword' => 'required|max:20'
        ]);

        $searched_news_array = News::search($request);
        $news_count = $searched_news_array->count();
        $selected_category = Category::where('id', $request->category)->first();
        $countries = $request->countries ?? [];
        $selected_countries = Country::whereIn('id', $countries)->get();

        return view('user.news.search')
            ->with('searched_news_array', $searched_news_array)
            ->with('news_count', $news_count)
            ->with('keyword', $request->keyword)
            ->with('selected_category', $selected_category)
            ->with('selected_countries', $selected_countries);
    }

    public function editor()
    {
        $all_news = News::all();
        $sources = Source::all();
        $country = Country::all();
        return view('user.news.editor')->with('all_news', $all_news)->with('sources', $sources)->with('countries', $country);
        ;
    }
}
