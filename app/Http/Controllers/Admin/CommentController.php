<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $comments = Comment::orderBy('created_at', 'desc')->withTrashed()->paginate(10);

        return view('admin.comments.show')->with('comments', $comments);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment_id)
    {
        Comment::destroy($comment_id);

        return redirect()->back();
    }

    public function restore($comment_id)
    {
        Comment::withTrashed()->where('id', $comment_id)->restore();

        return redirect()->back();
    }
}
