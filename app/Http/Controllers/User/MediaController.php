<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\News;
use App\Models\Source;
use App\Consts\NewsStatusConst;

class MediaController extends Controller
{
    public function show($id)
    {
        $all_news = News::where('source_id', $id)
                        ->where('status', NewsStatusConst::PUBLISHED)
                        ->where('post_date', '<=', News::currentTime())
                        ->latest('published_at')
                        ->get();

        $media = Source::findOrFail($id);
        
        return view('user.news.media')
                ->with('all_news', $all_news)
                ->with('media', $media);
    }
}
