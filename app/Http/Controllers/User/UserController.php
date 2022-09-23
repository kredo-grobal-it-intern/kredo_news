<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Source;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/avatars/';

    public function showLikes(Request $request)
    {
        $user      = User::findOrFail($request->user_id);
        $reactions = $user->newsReactions->filter(function ($reaction) {
            return $reaction->pivot->status == 1;
        });

        return view('user.profile.show.likes')
                ->with('reactions', $reactions)
                ->with('user', $user);
    }

    public function showBookmarks()
    {
        $user      = Auth::user();
        $bookmarks = $user->newsBookmarks;

        return view('user.profile.show.bookmarks')
                ->with('bookmarks', $bookmarks)
                ->with('user', $user);
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::id());
        $favorite_sources_ids = $user->favoriteSources->pluck('id')->toArray();
        $sources = Source::all();
        $continents = [ 'America','Asia','Europe','Oceania','Africa' ];
        $favorite_countries_ids = $user->favoriteCountries->pluck('id')->toArray();

        return view('user.profile.edit', [
                'user' => $user,
                'sources' => $sources,
                'continents' => $continents,
                'favorite_sources_ids' => $favorite_sources_ids,
                'favorite_countries_ids' => $favorite_countries_ids
        ]);
    }

    public function update(Request $request)
    {
        $user                 = Auth::user();
        $user->username       = $request->username;
        $user->email          = $request->email;
        $user->description    = $request->description;
        $user = User::findOrFail(Auth::id());
        $user->username = $request->username;
        $user->email = $request->email;
        $user->nationality_id = $request->nationality;
        $user->country_id     = $request->country;
        $sources              = $request->sources ?? [];

        $favorite_sources = [];
        foreach ($sources as $source) {
            $favorite_sources[] = [
            'user_id' => $request->id,
            'source_id' => $source
            ];
        }
            DB::table('favorite_sources')->where('user_id', $user->id)->delete();
            DB::table('favorite_sources')->insert($favorite_sources);
        $countries = $request->countries ?? [];
        $favorite_countries = [];
        foreach ($countries as $country) {
            $favorite_countries[] = [
                'user_id' => $request->id,
                'country_id' => $country
            ];
        }
            DB::table('favorite_countries')->where('user_id', $user->id)->delete();
            DB::table('favorite_countries')->insert($favorite_countries);

        if ($request->avatar) :
            $this->deleteAvatar($user->avatar);
            $user->avatar = $this->saveAvatar($request);
        endif;

        $user->save();

        return redirect()->route('user.profile.show.likes', ['user_id' => $user->id]);
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

    public function destroyFollower($follower_id)
    {
        DB::table('follows')
            ->where('following_id', Auth::id())
            ->where('follower_id', $follower_id)
            ->delete();

        return redirect()->back();
    }

    public function destroyFollowing($following_id)
    {
        DB::table('follows')
            ->where('following_id', $following_id)
            ->where('follower_id', Auth::id())
            ->delete();

        return redirect()->back();
    }
}
