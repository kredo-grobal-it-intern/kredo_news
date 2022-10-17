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
use App\Services\ImageService;

class NewsController extends Controller
{
    const PUBLISHED = 1;
    const DRAFT = 2;

    const LOCAL_STORAGE_FOLDER = 'public/images/news/';
    const SIZE = ['height' => 840, 'width' => 550];

    public function index()
    {
        $all_news = News::with(['category', 'country', 'source.country', 'reactions'])
            ->withCount('comments')
            ->withTrashed()
            ->get();
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
        $all_media  = Source::with('country')->get();
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

        $news->title          = $request->title;
        $news->description    = $request->description;
        $news->country_id     = $request->country_id;
        $news->category_id    = $request->category_id;
        $news->source_id      = $request->source_id;
        $news->url            = $request->url;
        $news->published_at   = $request->published_at;
        $news->author         = $request->author;
        $news->image          = ImageService::saveImage($request->image, self::SIZE, self::LOCAL_STORAGE_FOLDER);
        ;
        $news->content        = $request->content;
        $news->post_date_time = $request->post_date_time;
        $news->status         = $request->status;

        $news->save();

        return redirect()->route('admin.show.dashboard');
    }

    public function edit($news_id)
    {
        $news = News::with(['category', 'country', 'source.country'])->findOrFail($news_id);
        $all_media  = Source::with('country')->get();
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

        $news->title          = $request->title;
        $news->description    = $request->description;
        $news->source_id      = $request->source_id;
        $news->url            = $request->url;
        $news->published_at   = $request->published_at;
        $news->author         = $request->author;
        $news->content        = $request->content;
        $news->post_date_time = $request->post_date_time;
        $news->status         = $request->status;

        if ($news->image) {
            ImageService::deleteImage($news->image, self::LOCAL_STORAGE_FOLDER);
            $news->image = ImageService::saveImage($request->image, self::SIZE, self::LOCAL_STORAGE_FOLDER);
        } else {
            $news->image = $this->saveImage($request->image);
        };

        $news->save();

        return redirect()->route('news.index');
    }

    public function display($news_id)
    {
        $news = News::withTrashed()->findOrFail($news_id);

        if ($news->deleted_at) {
            $news->restore();
        }

        if ($news->status == self::DRAFT) {
            $news->status = self::PUBLISHED;
            $news->save();
        }

        return redirect()->back();
    }

    public function destroy($news_id)
    {
        $news = News::withTrashed()->findOrFail($news_id);

        if ($news->deleted_at) {
            $news->restore();
        }

        if ($news->status == self::DRAFT) {
            $news->status = self::PUBLISHED;
            $news->save();
        }

        return redirect()->back();
    }

    public function draft($news_id)
    {
        $news = News::withTrashed()->findOrFail($news_id);

        if ($news->deleted_at) {
            $news->restore();
        }

        if ($news->status == self::PUBLISHED) {
            $news->status = self::DRAFT;
            $news->save();
        }

        return redirect()->back();
    }
}
