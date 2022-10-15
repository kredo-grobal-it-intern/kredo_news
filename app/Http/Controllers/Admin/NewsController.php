<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreUpdateRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Source;
use Illuminate\Support\Facades\DB;
use App\Library\Picture;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class NewsController extends Controller
{
    const PUBLISHED = 1;
    const DRAFT = 2;

    const LOCAL_STORAGE_FOLDER = 'app/public/images/news/';

    public function index()
    {
        $all_news = News::withTrashed()->get();
        // $all_news = News::orderBy('post_date', 'desc')->withTrashed()->paginate(10);
        return view('admin.news.list')
            ->with('all_news', $all_news);
    }

    public function showDashboard()
    {
        $news          = News::withTrashed()->get();
        $users         = User::withTrashed()->get();
        $comments      = Comment::withTrashed()->with('user')->get();
        $reactions     = DB::table('reactions')->get();
        $bookmarks     = DB::table('bookmarks')->get();
        $good_news     = News::getTopGoodNewsList();
        $bad_news      = News::getWorstBadNewsList();
        $bookmark_news = News::getTopBookmarkNewsList();

        return view('admin.dashboard')
            ->with('news', $news)
            ->with('users', $users)
            ->with('comments', $comments)
            ->with('reactions', $reactions)
            ->with('good_news', $good_news)
            ->with('bad_news', $bad_news)
            ->with('bookmark_news', $bookmark_news)
            ->with('bookmarks', $bookmarks);
    }


    public function showUsersList()
    {
        return view('admin.users.show');
    }

    public function create()
    {
        $all_media  = Source::all();
        $categories = Category::all();
        $countries  = Country::whereNotNull('continent')->get();

        return view('admin.news.create')
            ->with('all_media', $all_media)
            ->with('categories', $categories)
            ->with('countries', $countries);
    }


    public function store(NewsStoreUpdateRequest $request)
    {
        $news = new News;

        $news->title        = $request->title;
        $news->description  = $request->description;
        $news->country_id   = $request->country_id;
        $news->category_id  = $request->category_id;
        $news->source_id    = $request->source_id;
        $news->url          = $request->url;
        $news->published_at = $request->published_at;
        $news->author       = $request->author;
        $news->image        = Picture::save($request, self::LOCAL_STORAGE_FOLDER);
        $news->content      = $request->content;
        $news->post_date    = $request->post_date;
        $news->post_time    = $request->post_time;
        $news->status       = $request->status;

        $news->save();

        return redirect()->route('admin.show.dashboard');
    }

    public function edit($news_id)
    {
        $news = News::findOrFail($news_id);
        $all_media  = Source::all();
        $categories = Category::all();
        $countries  = Country::whereNotNull('continent')->get();

        return view('admin.news.edit')
            ->with('news', $news)
            ->with('all_media', $all_media)
            ->with('categories', $categories)
            ->with('countries', $countries);
    }

    public function update(NewsStoreUpdateRequest $request, $news_id)
    {
        $news = News::findOrFail($news_id);

        $news->title        = $request->title;
        $news->description  = $request->description;
        $news->source_id    = $request->source_id;
        $news->url          = $request->url;
        $news->published_at = $request->published_at;
        $news->author       = $request->author;
        $news->content      = $request->content;
        $news->post_date    = $request->post_date;
        $news->post_time    = $request->post_time;
        $news->status       = $request->status;

        // $image = $request->image;
        $file_name =time() . '.' . 'webp';

        if ($news->image) {
            $storage = 'public/images/news/'.$file_name;
            $old_image ='public/images/news/'.$news->image;
            $resize_image = Image::make($request->image)->resize(10, 10)->encode('webp');

            if(Storage::disk('local')->exists($old_image)) {
                Storage::disk('local')->delete($old_image);

            }            
            if(Storage::disk('local')->exists($storage)){
                Storage::disk('local')->delete($storage);
            }else{
                Storage::putFileAs('public/images/news/', $resize_image, $file_name);
            }
            $news->image = $file_name;
            
        } else {
            Storage::putFileAs('public/images/news/', $request->image, $file_name);
            $news->image = $file_name;
        };


        $news->save();

        return redirect()->route('news.index');
    }

    public function destroy($news_id)
    {
        News::destroy($news_id);

        return redirect()->back();
    }

    public function restore($news_id)
    {
        News::withTrashed()->where('id', $news_id)->restore();

        return redirect()->back();
    }
}
