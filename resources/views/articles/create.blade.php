@extends('layouts.app')

@section('content')
  <div class="container mb20">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            <div class="card-text">
              <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="md-form">
                  <label>タイトル</label>
                  <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
                </div>
                <div class="form-group">
                  <label>場所</label>
                  <select type="text" name="pref" class="form-control" required value="{{ $article->pref ?? old('pref') }}">
                    @foreach(config('pref') as $key => $score)
                      <option value="{{ $score }}">{{ $score }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <article-tags-input
                    :initial-tags='@json($tagNames ?? [])'
                    :autocomplete-items='@json($allTagNames ?? [])'
                  >
                  </article-tags-input>
                </div>
                <div class="form-group">
                  <label for="file1">写真を投稿</label>
                  <input type="file" id="file1" name='image' class="form-control-file">
                </div>
                <div class="form-group">
                  <label></label>
                  <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block" value="投稿">投稿する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection