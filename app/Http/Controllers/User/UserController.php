<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        // tentative method
        $all_news = News::all();
        return view('user.profile.index')
            ->with('all_news', $all_news);
    }

}
