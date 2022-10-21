<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Source;
use App\Models\Country;
use App\Mail\RestoreMail;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProfileUpdateRequest;

class UserController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/avatars/';
    const SIZE = ['height' => 180, 'width' => 180];

    public function index()
    {
        $users = User::with('country')
            ->withCount(['comments', 'followers', 'followings'])
            ->where('is_admin', 0)->withTrashed()->get();
        return view('admin.users.list')->with('users', $users);
    }


    public function show(Request $request)
    {
        $user = User::withCount(['comments', 'followers', 'followings'])
            ->with(['comments.news', 'followers', 'followings'])
            ->findOrFail($request->user_id);
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
    public function changePasswordPost(Request $request) {
        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            // The passwords matches
            return response()->json([
                'status' => 'error',
                'message' => 'Your current password does not matches with the password.'
            ],500);
        }

        if(strcmp($request->current_password, $request->password) == 0){
            // Current password and new password same
            return response()->json([
                'status' => 'error',
                'message' => 'New Password cannot be same as your current password.'
            ],500);
        }

        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        if($user->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Password successfully changed!'
            ]);
        }
        return response()->json();
    }
}