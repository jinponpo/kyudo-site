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
                  <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                </div>
                <div class="form-group">
                  <label></label>
                  <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ old('body') }}</textarea>
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