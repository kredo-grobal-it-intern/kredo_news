<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (!$this->isRegistered($request)) {
            throw ValidationException::withMessages([
                'email' => "The email is not registered",
            ]);
        }
        if ($this->isBlockUser($request)) {
            throw ValidationException::withMessages([
                'email' => "User has been blocked by the admin.",
            ]);
        } elseif (!$this->isActiveUser($request)) {
            throw ValidationException::withMessages([
                'email' => "User has been deactivated.",
            ]);
        }

        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        throw ValidationException::withMessages([
            $this->username() => [
                trans(
                    'auth.throttle',
                    [
                        'seconds' => $seconds,
                        'minutes' => ceil($seconds / 60),
                    ]
                )
            ],
        ])->status(Response::HTTP_TOO_MANY_REQUESTS);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->boolean('remember')
        );
    }

    protected function incrementLoginAttempts(Request $request)
    {
        $this->limiter()->hit(
            $this->throttleKey($request),
            $this->decayMinutes() * 60
        );
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function isActiveUser(Request $request)
    {
        $email = $request->email;
        $user = User::withTrashed()->where('email', $email)->first();
        if ($user->deleted_at) {
            return false;
        }
        return true;
    }
    protected function isBlockUser(Request $request)
    {
        $email = $request->email;
        $user = User::withTrashed()->where('email', $email)->first();
        if ($user->blocked_at) {
            return true;
        }
        return false;
    }
    protected function isRegistered(Request $request)
    {
        $email = $request->email;
        $user = User::withTrashed()->where('email', $email)->first();
        if ($user) {
            return true;
        }
        return false;
    }
}
