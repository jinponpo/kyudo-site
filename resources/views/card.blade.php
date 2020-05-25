<div class="card mt-3 relative">
  <div class="card-body d-flex flex-row">
    <div>
      <div class="h5">
        <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
          {{ $article->user->name }}
            <span class="font-weight-lighter h6 ml-2">
              {{ $article->created_at->format('Y/m/d H:i') }}
            </span> 
        </a>
      </div>
    </div>
    
    <div class="card-edit">
    @if( Auth::id() === $article->user_id )
        <div class="ml-auto card-text">
          <a class="dropdown-item" href="{{ route("articles.edit", ['article' => $article]) }}">
            <i class="fas fa-pen mr-1"></i>投稿を更新する
          </a>
          <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
            <i class="fas fa-trash-alt mr-1"></i>投稿を削除する
          </a>
        </div>
    
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
                  {{ $article->title }}を削除しますか？
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