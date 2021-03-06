<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Storage;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }
    
    public function index(Request $request)
    {
        
        if($request->has('keyword')) {
            $articles = Article::where('title', 'like', '%'.$request->get('keyword').'%')->paginate(6);
        }  elseif($request->has('pref')) {
            $articles = Article::where('pref', 'like', '%'.$request->get('pref').'%')->paginate(6);
        }  else{
            $articles = Article::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        }

        return view('articles/index', ['articles' => $articles]);
    }
    
    public function create()
    {
        $prefs = config('pref');
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });
 
        return view('articles.create', [
            'prefs' => $prefs,
            'allTagNames' => $allTagNames,
        ]);
    }
    
    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = Storage::disk('s3');
            $path = $path->put('myprefix', $image, 'public');
            $article->image = Storage::disk('s3')->url($path);
            $article->save();
        } else {
            $article->save();
        }

        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect('/')->with('flash_message', '投稿が完了しました');
    }
    
    public function edit(Article $article)
    {
        $tagNames = $article->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('articles.edit', [
            'article' => $article,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
        ]);
    }
    
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();

        $article->tags()->detach();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });
        return redirect()->route('articles.index');
    }
    
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
    
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }
    
    public function like(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);
        $article->likes()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }
}
