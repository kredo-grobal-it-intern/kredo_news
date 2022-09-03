<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Source;
use App\Models\Country;

class NewsController extends Controller
{
    public function index()
    {
        $all_news = News::all();
        return view('user.news.index')
            ->with('all_news', $all_news);
    }

    public function show($news_id){
        $news = News::findOrFail($news_id);
        return view('user.news.detail')
            ->with('news',$news);
    }
    public function filter(){
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
        return view('user.news.favorite')->with('all_news',$all_news)->with('sources', $sources)->with('countries', $country);
    
    }

    public function showNonUser()
    {
        $country = Country::all();
        return view('user.news.non_user')->with('countries', $country);
    }
}

