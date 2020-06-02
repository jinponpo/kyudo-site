<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use Auth;
use Validator;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Comment $comment, Article $article)
    {
        $comment->comment = $request->comment;
        $comment->article_id = $request->article_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect('/')->with('flash_message', 'コメントの投稿が完了しました');
    }    

    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/')->with('flash_message', 'コメントの削除が完了しました');
    }
}
