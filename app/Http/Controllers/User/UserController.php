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
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    const LOCAL_STORAGE_FOLDER ='public/avatars/';

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
        $continents = [ 'America','Asia','Europe','Oceania','Africa' ];
        $countries = Country::whereIn('continent', [ 'america', 'asia', 'europe','oceania','africa' ])->get();

         return view('user.profile.edit', [
                'user' => $user,
                'sources' => $sources,
                'continents' => $continents,
                'countries' => $countries
        ]);
    }

    public function update(Request $request,User $user){
//update user detail
    $user_id = Auth::user()->id;
    $user = User::findOrFail($user_id);

    $user->username = $request->username;
    $user->email = $request->email;
    $user->nationality = $request->nationality;
    $user->country = $request->country;

    // $favorite_source = $request->fav_source;
    // $favorite_country->fav_country = $request->fav_country;

// remove pre selected favorite site/country
        if($request->avatar):
            $this->deleteAvatar($user->avatar);
            $user->avatar = $this->saveAvatar($request);
        endif;


// insert new favorite from form
        $user->save();
        return redirect()->route('user.profile.show');

    }

    public function saveAvatar($request){
        $avatar_name = time().".".$request->avatar->extension();
        $request->avatar->storeAs(self::LOCAL_STORAGE_FOLDER,$avatar_name);
        return $avatar_name;
    }

    public function deleteAvatar($avatar_name){
        $image_path=self::LOCAL_STORAGE_FOLDER.$avatar_name;
        if(Storage::disk('local')->exists($image_path)):
           Storage::disk('local')->delete($image_path);
        endif;
    }



}
