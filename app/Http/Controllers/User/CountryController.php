<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CountryController extends Controller
{
    public function show($id)
    {
        $user=Auth::user();
        $countries=Country::all();
        $all_news = News::where('country_id',$id)->get();
        $country = Country::findOrFail($id);
        return view('user.news.country')->with('country',$country)->with('all_news',$all_news)->with('countries',$countries)->with('user',$user);
    }
}
