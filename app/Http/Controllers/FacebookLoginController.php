<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookLoginController extends Controller
{
    public function getFacebookAuth()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function authFacebookCallback()
    {
        $facebook_user = Socialite::driver('facebook')->stateless()->user();
        $user = User::where('email', $facebook_user->email)->first();

        if ($user === null) {
            $user = $this->createUserByFacebook($facebook_user);
        }
        Auth::login($user);
        return redirect()->route('news.index');
    }

    public function createUserByFacebook($facebook_user)
    {
        $user = User::create([
            'username' => $facebook_user->name,
            'email' => $facebook_user->email,
            'facebook_id' => $facebook_user->id,
            'password' => Hash::make('password'),
        ]);
        return $user;
    }
}
