<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\UpdatePassword;
use Hash;
use Auth;

class UpdatePasswordController extends Controller
{
    public function showChangePasswordGet() {
        return view('auth.passwords.change-password');
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
