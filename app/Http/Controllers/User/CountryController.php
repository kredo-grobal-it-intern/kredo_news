<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Country;
use App\Models\News;

class CountryController extends Controller
{
    public function show($id)
    {
        $all_news = News::withCount('comments')->with('bookmarks')->where('country_id', $id)->get();
        $country = Country::findOrFail($id);
        return view('user.news.country')->with('country', $country)->with('all_news', $all_news);
    }
}
