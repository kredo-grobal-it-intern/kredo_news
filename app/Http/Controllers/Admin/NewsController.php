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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/news';

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

    public function show()
    {

        $all_news = News::orderBy('published_at', 'desc')->withTrashed()->paginate(10);
        return view('admin.news.show')
                    ->with('all_news', $all_news);
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
        $news->country_id  = $request->country_id;
        $news->category_id  = $request->category_id;
        $news->source_id    = $request->source_id;
        $news->url          = $request->url;
        $news->published_at = $request->published_at;
        $news->author       = $request->author;
        $news->image        = $this->saveImage($request);
        $news->content      = $request->content;

        $news->save();

        return redirect()->route('news.index');
    }

    public function saveImage($request)
    {
        $image_name = time() . '.' . $request->image->extension();

        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

        return $image_name;
    }

    public function deleteImage($image)
    {
        $image_name = self::LOCAL_STORAGE_FOLDER . $image;

        if (Storage::disk('local')->exists($image_name)) {
            Storage::disk('local')->delete($image_name);
        }
    }

    public function edit($news_id)
    {
        $news = News::findOrFail($news_id);

        return view('admin.news.edit', compact('news'));
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

        if ($request->image) {
            if ($news->image) {
                $this->deleteImage($news->image);
                $news->image = $this->saveImage($request);
            } else {
                $news->image = $this->saveImage($request);
            }
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
