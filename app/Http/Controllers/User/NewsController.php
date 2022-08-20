<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $all_news = News::all();
        return view('user.news.index')
            ->with('all_news', $all_news);
    }
}
