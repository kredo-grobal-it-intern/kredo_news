<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->withTrashed()->paginate(10);

        return view('admin.comments.list')->with('comments', $comments);
    }


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

    public function destroy(Request $request)
    {
        Comment::findOrFail($request->comment_id)->delete();
        return response()->json();
    }

    public function restore($comment_id)
    {
        Comment::withTrashed()->where('id', $comment_id)->restore();

        return redirect()->back();
    }

    public function like(Request $request)
    {
        $user_id = Auth::id();
        $comment_id = $request->comment_id;
        $comment = Comment::findOrFail($comment_id);

        $comment->isLiked() ? $comment->commentLikes()->detach($user_id) : $comment->commentLikes()->attach($user_id);

        $param = [
            'commentLikesCount' => Comment::withCount('commentLikes')->findOrFail($comment_id)->comment_likes_count
        ];

        return response()->json($param);
    }
}
