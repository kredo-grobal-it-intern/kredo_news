<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);

        Profile::truncate();

        $profile = new Profile;
        $form = $request->all();

        unset($form['_token']);

        $profile->fill($form);
        $profile->save();

        $profile_history = new ProfileHistory;
        $profile_history->edited_at = Carbon::now();
        $profile_history->save();

        return redirect('admin/profile/edit');
    }
}
