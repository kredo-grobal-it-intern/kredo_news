<?php

namespace App\Http\Controllers\User;

use App\Models\News;
use App\Models\Source;
use App\Models\Country;
use App\Models\Category;
use App\Consts\SourceConst;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news_list = [
            'America' => News::getNewsBySource(SourceConst::AMERICA),
            'Asia' => News::getNewsBySource(SourceConst::ASIA),
            'Europe' => News::getNewsBySource(SourceConst::EUROPE),
            'Africa' => News::getNewsBySource(SourceConst::AFRICA),
            'Oceania' => News::getNewsBySource(SourceConst::OCEANIA),
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
        $favorite_news = News::where('source_id', $source->id)->get();
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
