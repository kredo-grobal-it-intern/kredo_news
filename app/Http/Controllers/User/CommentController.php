<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $news_id)
    {
        $request->validate([
            'comment' => 'max:200',
        ]);
        Comment::create([
            'user_id' => Auth::user()->id,
            'news_id' => $news_id,
            'body' => $request->comment,
        ]);

        return redirect()->back();
    }
}
