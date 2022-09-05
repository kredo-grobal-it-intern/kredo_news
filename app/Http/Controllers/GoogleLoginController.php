<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function getGoogleAuth()
    {
        return Socialite::driver('google')->redirect();
    }

    public function authGoogleCallback()
    {
        $google_user = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $google_user->email)->first();

        if ($user === null) {
            $user = $this->createUserByGoogle($google_user);
        }
        Auth::login($user, true);
        return redirect()->route('news.index');
    }

    public function createUserByGoogle($google_user) {
        $user = User::create([
            'username' => $google_user->name,
            'email' => $google_user->email,
            'password' => Hash::make('password'),
        ]);
        return $user;
    }
}
