@extends('layouts.app')

@section('content')
<div class="container">
  <div class="text-align-center h1 mt10 mb20">
    〜投稿詳細ページ〜
  </div>
  <div class="card mt-3">
    <div class="card-body">
    @if(!empty($article->image))
    <div class='image-wrapper'>
      <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
        <img class='show-image' src="{{ $article->image }}">
      </a>
    </div>
    @else
      <div class='image-wrapper'>
        <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
          <img class='show-image' src="{{ asset('images/blank_profile.png') }}">
        </a>
      </div>
    @endif
      <div>
        <div>
          <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
            {{ $article->user->name }}
          </a>
        </div>
        <div class="font-weight-lighter h6">
          <a href="{{ route('users.show', ['name' => $article->user->name]) }}"
          class="text-dark">
            {{ $article->created_at->format('Y/m/d H:i') }}
          </a>
        </div>
      </div>
      
      <div class="card-edit">
        @if( Auth::id() === $article->user_id )
        <!-- dropdown -->
        <div class="ml-auto card-text">
          <div class="dropdown">
            <a class="dropdown-item" href="{{ route("articles.edit", ['article' => $article]) }}">
              <i class="fas fa-pen mr-1"></i>記事を更新する
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
              <i class="fas fa-trash-alt mr-1"></i>記事を削除する
            </a>
          </div>
        </div>
        <!-- dropdown -->

        <!-- modal -->
        <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                  {{ $article->title }}を削除します。よろしいですか？
                </div>
                <div class="modal-footer justify-content-between">
                  <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                  <button type="submit" class="btn btn-danger">削除する</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <!-- modal -->
      @endif
    </div>

      </div>
      <div class="card-body pt-0 pb-2">
        <h4 class="card-title font-weight-bold">
          <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
            {{ $article->title }}
          </a>
        </h4>
        <div class="card-text text-dark">
          {{ $article->pref }}
        </div>
      <div class="card-text">
        <a class="text-dark font-weight-lighter" href="{{ route('articles.show', ['article' => $article]) }}">
          {!! nl2br(e( $article->body )) !!}
        </a>
      </div>
      <div class="card-body pt-1 pb-2 pl-3 h5">
        <div class="row">
          <article-like
            :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
            :initial-count-likes='@json($article->count_likes)'
            :authorized='@json(Auth::check())'
            endpoint="{{ route('articles.like', ['article' => $article]) }}"
          >
          </article-like>
        </div>
      </div>
      @foreach($article->tags as $tag)
        @if($loop->first)
          <div class="card-body pt-0 pb-4 pl-0">
            <div class="card-text line-height">
        @endif
        <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
          {{ $tag->hashtag }}
        </a>
        @if($loop->last)
          </div>
        </div>
      @endif
    @endforeach
    </div>
  </div>

  <div>
    <h3 class="mt-3">
      コメント一覧
    </h3>
    @auth
    <div class="row actions mb-3">
      <form class="w-100" action="/articles/{comment_id}/comments" data-remote="true" method="post"><input name="utf8" type="hidden" value="✓" />
        {{csrf_field()}} 
        <input value="" type="hidden" name="user_id" />
        <input value="{{ $article->id }}" type="hidden" name="article_id" />
        <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
      </form>
    </div>
    @endauth
    
  @foreach ($article->comments as $comment) 
    <div class="mb-2">
      @auth
      @if ($comment->user->id == Auth::user()->id)
        <a class="delete-comment" data-remote="true" rel="nofollow" data-method="delete" href="/comments/{{ $comment->id }}"></a>
      @endif
      @endauth
      <span>
        <strong>
          {{ $comment->user->name }}
        </strong>
      </span>
      <span>{{ $comment->comment }}</span>
    </div>
    <div class="text-dark">
      {{    $article->created_at->format('Y/m/d') }}
    </div>
    <hr>
  @endforeach
  </div>


  <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key=AIzaSyBQCqrHT55gPe0VRd0x_WGbXl7PWFmObEE&amp;q={{ $article->title }}'
    class='mt60' width='100%' height='480' frameborder='0'>
  </iframe>
</div>
@endsection