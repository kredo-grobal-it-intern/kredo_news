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
        $all_news = News::all();
        return view('user.profile.index')
            ->with('all_news', $all_news);
    }

    public function edit(){
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $sources = Source::all();
            return view('user.profile.edit', [
                'user' => $user,
                'sources' => $sources
             ]);

    }

    public function update(Request $request){


    }

}
