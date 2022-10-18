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
        $all_news = News::withCount('comments')
                        ->with(['bookmarks', 'reactions'])
                        ->where('country_id', $id)
                        ->where('status', NewsStatusConst::PUBLISHED)
                        ->where('post_date_time', '<=', News::currentTime())
                        ->latest('published_at')
                        ->get();

        $country = Country::findOrFail($id);
        return view('user.news.country')->with('country', $country)->with('all_news', $all_news);
    }
}
