<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Source;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\RestoreMail;
use Illuminate\Support\Facades\Session;
=======
use Illuminate\Support\Facades\Mail;
use App\Mail\RestoreMail;
use Illuminate\Support\Facades\Session;
use App\Services\ImageService;
>>>>>>> main

class UserController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/avatars/';
    const SIZE = ['height' => 180, 'width' => 180];

    public function index()
    {
        // $users = User::where('is_admin', 0)->withTrashed()->paginate(10);
        $users = User::where('is_admin', 0)->withTrashed()->get();
        return view('admin.users.list')->with('users', $users);
    }


    public function show(Request $request)
    {
<<<<<<< HEAD
        $user = User::withCount(['comments', 'followers', 'followings'])->findOrFail($request->user_id);
=======
        $user = User::withCount(['comments', 'followers', 'followings'])
            ->with(['comments.news', 'followers', 'followings'])
            ->findOrFail($request->user_id);
>>>>>>> main
        $liked_news = $user->reactions()
            ->withCount('comments')
            ->with(['country', 'category', 'reactions', 'bookmarks'])
            ->latest('published_at')
            ->get()
            ->filter(function ($reaction) {
                return $reaction->pivot->status == 1;
            });
        $bookmarked_news = $user->bookmarks()
            ->withCount('comments')
            ->with(['country', 'category', 'reactions'])
            ->latest('published_at')
            ->get();

        return view('user.profile.show')
            ->with('liked_news', $liked_news)
            ->with('bookmarked_news', $bookmarked_news)
            ->with('user', $user);
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::id());
        $favorite_sources_ids = $user->favoriteSources->pluck('id')->toArray();
        $sources = Source::all();
        $continents = ['America', 'Asia', 'Europe', 'Oceania', 'Africa'];
        $all_countries = Country::all();
        $favorite_countries_ids = $user->favoriteCountries->pluck('id')->toArray();

        return view('user.profile.edit', [
            'user' => $user,
            'sources' => $sources,
            'continents' => $continents,
            'all_countries' => $all_countries,
            'favorite_sources_ids' => $favorite_sources_ids,
            'favorite_countries_ids' => $favorite_countries_ids
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user                 = Auth::user();
        $user->username       = $request->username;
        $user->email          = $request->email;
        $user->nationality_id = $request->nationality;
        $user->country_id     = $request->country;
        $user->description    = $request->description;
        $sources              = $request->sources ?? [];
        $countries            = $request->countries ?? [];

        $favorite_sources = [];
        foreach ($sources as $source) {
            $favorite_sources[] = [
                'user_id' => $request->id,
                'source_id' => $source
            ];
        }
        $user->favoriteSources()->detach();
        $user->favoriteSources()->attach($favorite_sources);

        $favorite_countries = [];
        foreach ($countries as $country) {
            $favorite_countries[] = [
                'user_id' => $request->id,
                'country_id' => $country
            ];
        }
        $user->favoriteCountries()->detach();
        $user->favoriteCountries()->attach($favorite_countries);


        if ($user->avatar) {
            ImageService::deleteImage($user->avatar, self::LOCAL_STORAGE_FOLDER);
            $user->avatar = ImageService::saveImage($request->avatar, self::SIZE, self::LOCAL_STORAGE_FOLDER);
        } else {
            $user->avatar = ImageService::saveImage($request->avatar, self::SIZE, self::LOCAL_STORAGE_FOLDER);
        };

        $user->save();

        return redirect()->route('user.profile.show', ['user_id' => $user->id]);
    }

    public function destroy($user_id)
    {
        User::destroy($user_id);

        return redirect()->back();
    }

    public function restore($user_id)
    {
        User::withTrashed()->where('id', $user_id)->restore();

        return redirect()->back();
    }
    public function reactivate($user_id)
    {
        User::withTrashed()->where('id', $user_id)->restore();
        Session::flash('reactivate', 'Your account has been restored');
        return redirect(route('login'));
    }
    public function withdrawal()
    {
        $user = Auth::user();
        Auth::logout();
        Session::flash('withdrawal', 'Your account has been deleted');
        Mail::to($user->email)->send(new RestoreMail($user));
        $user->delete();
        return redirect(route('news.index'));
    }
}
