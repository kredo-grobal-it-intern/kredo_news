<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::where('is_admin', 0)->withTrashed()->paginate(10);
        $users = User::where('is_admin', 0)->withTrashed()->get();
        return view('admin.users.list')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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


    // Extra function
    // public function destroy($user_id)
    // {
    //   if($this->user->destroy($user_id)) {
    //     return response()->json([
    //       'message' => 'User deactivated successfully',
    //     ], 200);
    //   } else {
    //     return response()->json([
    //       'message' => 'Error deactivating user'
    //     ], 500);
    //   }

    // }
}
