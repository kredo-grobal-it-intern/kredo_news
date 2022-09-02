<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Models\Category;
use App\Models\Country;
use App\Models\Source;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function show(){
        // tentative method
        // $user_id = Auth::user()->id;
        // $user = User::findOrFail($user_id);
        $all_news = News::all();
        return view('user.profile.index')
            ->with('all_news', $all_news);
    }

    public function edit(){
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $sources = Source::all();
        $countries = Country::where('continent','=','america')
                                        ->orWhere('continent','=','asia')
                                        ->orWhere('continent','=','europe')
                                        ->orWhere('continent','=','africa')
                                        ->orWhere('continent','=','oceania')
                                        ->get();
         return view('user.profile.edit', [
                'user' => $user,
                'sources' => $sources,
                'countries' => $countries
        ]);

    }

    public function update(Request $request){
//update user detail

// remove pre selected favorite site

// insert new favorite from form

    }

}
