<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreUpdateRequest;
use Illuminate\Http\Request;

use App\Models\News;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    private $news;
    const LOCAL_STORAGE_FOLDER = 'public/images/';

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function showDashboard()
    {
        $news     = News::withTrashed()->get();
        $users    = User::withTrashed()->get();
        $comments = Comment::withTrashed()->with('user')->get();
        
        return view('admin.dashboard')
                ->with('news', $news)
                ->with('users', $users)
                ->with('comments', $comments);
    }

    public function show()
    {

        $all_news = $this->news->orderBy('published_at')->withTrashed()->paginate(10);
        return view('admin.news.show')
                    ->with('all_news', $all_news);
    }

    public function showUsersList()
    {
        return view('admin.users.show');
    }

    public function create(Request $request)
    {
        return view('admin.news.create');
    }


    public function store(NewsStoreUpdateRequest $request)
    {
        $news = $this->news;

        $news->title        = $request->title;
        $news->description  = $request->description;
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
        $news = $this->news->findOrFail($news_id);

        return view('admin.news.edit', compact('news'));
    }

    public function update(NewsStoreUpdateRequest $request, $news_id)
    {
        $news = $this->news->findOrFail($news_id);

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
