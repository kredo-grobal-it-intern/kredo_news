<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    public function show($id)
    {
        $all_news = News::withCount('comments')->with('bookmarks')->where('category_id', $id)->get();
        $category = Category::findOrFail($id);
        return view('user.news.category')->with('category', $category)->with('all_news', $all_news);
    }
}
