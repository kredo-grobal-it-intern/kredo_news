<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use App\Models\History;
use Carbon\Carbon;
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
      return view('admin.dashboard');
    }

    public function showNewsList(Request $request)
    {

      $all_news = $this->news->orderBy('published_at')->paginate(10);
      return view('admin.news.show')
                ->with('all_news', $all_news);
    }

    public function create(Request $request)
    {
        return view('admin.news.create');
    }


    public function store(Request $request)
    {
      $news = $this->news;

      $request->validate([
        'title'        => 'required',
        'description'  => 'required',
        'source_name'  => 'required',
        'url'          => 'required',
        'published_at' => 'required',
        'author'       => 'required',
        'content'      => 'required',
        'image_path'   => 'required|max:1048|mimes:png,jpg,jpeg,gif'
      ]);

      $news->title        = $request->title;
      $news->description  = $request->description;
      $news->source_name  = $request->source_name;
      $news->url          = $request->url;
      $news->published_at = $request->published_at;
      $news->author = $request->author;
      $news->image_path   = $this->saveImage($request);
      $news->content      = $request->content;

      $news->save();

      return redirect()->route('news.index');
    }

    public function saveImage($request)
    {
        $image_name = time() . '.' . $request->image_path->extension();
  
        $request->image_path->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);
        
        return $image_name;
    }

    public function deleteImage($image_path)
    {
      $image_name = self::LOCAL_STORAGE_FOLDER . $image_path;

      if(Storage::disk('local')->exists($image_name)){
        Storage::disk('local')->delete($image_name);
      }
    }

    public function edit($news_id)
    {
      $news = $this->news->findOrFail($news_id);

      return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $news_id)
    {
        $news = $this->news->findOrFail($news_id);

        $request->validate([
          'title'        => 'required',
          'description'  => 'required',
          'source_name'  => 'required',
          'url'          => 'required',
          'published_at' => 'required',
          'author'       => 'required',
          'content'      => 'required',
          'image_path'   => 'max:1048|mimes:png,jpg,jpeg,gif'
        ]);
  
        $news->title        = $request->title;
        $news->description  = $request->description;
        $news->source_name  = $request->source_name;
        $news->url          = $request->url;
        $news->published_at = $request->published_at;
        $news->author       = $request->author;
        $news->content      = $request->content;

        if($request->image_path){
          if($news->image_path){
            $this->deleteImage($news->image_path);
            $news->image_path = $this->saveImage($request);
          }else{
            $news->image_path = $this->saveImage($request);
          }};
  
        $news->save();

        return redirect()->route('news.index');
      }

    public function delete(Request $request)
    {
        $news = News::find($request->id);
        $news->delete();
        return redirect('admin/news/');
    }
}
