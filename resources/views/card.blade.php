<div class="card mt-3">
  <div class="card-body">
    @if(!empty($article->image))
    <div class='image-wrapper'>
      <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
        <img class='index-image' src="{{ $article->image }}">
      </a>
    </div>
    @else
      <div class='image-wrapper'>
        <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
          <img class='index-image' src="{{ asset('images/blank_profile.png') }}">
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
          {{ $article->created_at->format('Y/m/d') }}
        </a>
      </div>
    </div>
  </div>
  <div class="card-body pt-0 pb-2">
    <h4 class="card-title font-weight-bold">
      <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
        {{ $article->title }}
      </a>
    </h4>
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