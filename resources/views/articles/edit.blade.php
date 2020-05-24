@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            <div class="card-text">
              <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}">
                @method('PATCH')
                @csrf
                <div class="md-form">
                  <label>タイトル</label>
                  <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
                </div>
                <div class="form-group">
                  <article-tags-input
                    :initial-tags='@json($tagNames ?? [])'
                  >
                  </article-tags-input>
                </div>
                <div class="form-group">
                  <label></label>
                  <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
                </div>
                <button type="submit" class="btn blue-gradient btn-block">更新する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection