<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Country;
use App\Models\News;
use App\Consts\NewsStatusConst;

class CountryController extends Controller
{
    public function show($id)
    {
        $countries = Country::all();
        $all_news = News::where('country_id', $id)->where('status', NewsStatusConst::PUBLISHED)->get();
        $country = Country::findOrFail($id);
        return view('user.news.country')->with('country', $country)->with('all_news', $all_news)->with('countries', $countries);
    }
}
