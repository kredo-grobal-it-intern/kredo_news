<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\News;
use App\Models\Source;

class MediaController extends Controller
{
    public function show($id)
    {
        $all_news = News::where('source_id', $id)->get();
        $media = Source::findOrFail($id);
        return view('user.news.media')
                ->with('all_news', $all_news)
                ->with('media', $media);
    }
}
