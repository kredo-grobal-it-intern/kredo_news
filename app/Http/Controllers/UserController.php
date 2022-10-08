<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Source;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/avatars/';

    public function index()
    {
        // $users = User::where('is_admin', 0)->withTrashed()->paginate(10);
        $users = User::where('is_admin', 0)->withTrashed()->get();
        return view('admin.users.list')->with('users', $users);
    }


    public function show(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $liked_news = $user->reactions()->latest('published_at')->get()->filter(function ($reaction) {
            return $reaction->pivot->status == 1;
        });
        $bookmarked_news = $user->bookmarks()->latest('published_at')->get();

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
        $continents = [ 'America','Asia','Europe','Oceania','Africa' ];
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

        if ($request->avatar) {
            $this->deleteAvatar($user->avatar);
            $user->avatar = $this->saveAvatar($request);
        }

        $user->save();

        return redirect()->route('user.profile.show', ['user_id' => $user->id]);
    }

    public function saveAvatar($request)
    {
        $avatar_name = time().".".$request->avatar->extension();
        $request->avatar->storeAs(self::LOCAL_STORAGE_FOLDER, $avatar_name);
        return $avatar_name;
    }

    public function deleteAvatar($avatar_name)
    {
        $image_path = self::LOCAL_STORAGE_FOLDER.$avatar_name;
        if (Storage::disk('local')->exists($image_path)) :
            Storage::disk('local')->delete($image_path);
        endif;
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
}
