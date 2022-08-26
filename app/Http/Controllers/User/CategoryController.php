<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    public function show($id)
    {
        $categories=Category::all();
        $all_news = News::where('category_id',$id);
        $category = Category::findOrFail($id);
        return view('user.news.category')->with('category',$category)->with('all_news',$all_news);
    }
}
