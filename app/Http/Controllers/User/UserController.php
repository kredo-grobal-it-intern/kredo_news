<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use App\Models\Country;
use App\Models\Source;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/avatars/';

    public function show()
    {
        // tentative method
        // $user_id = Auth::user()->id;
        // $user = User::findOrFail($user_id);
        $all_news = News::all();
        return view('user.profile.index')
            ->with('all_news', $all_news);
    }

    public function edit()
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        $sources = Source::all();
        $continents = [ 'America','Asia','Europe','Oceania','Africa' ];
        $countries = Country::whereIn('continent', [ 'america', 'asia', 'europe', 'oceania', 'africa' ])->get();

         return view('user.profile.edit', [
                'user' => $user,
                'sources' => $sources,
                'continents' => $continents,
                'countries' => $countries
         ]);
    }
}
