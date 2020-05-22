<?php

namespace App\Http\Controllers;

use App\Like;
use App\Article;
use Auth;
use Validator;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $like = new Like;
        $like->article_id = $request->article_id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return redirect('/');
    }
    
    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();
        return redirect('/');
    }
}
