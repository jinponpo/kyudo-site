@extends('layouts.app')

@section('content')
  <div class="container">
    <h2 class="card-title m-0 text-center">タグ名 : {{ $tag->hashtag }} 
      <span class="card-text">
        {{ $tag->articles->count() }}件
      </span>
    </h2>
    @foreach($tag->articles as $article)
      @include('card')
    @endforeach
  </div>
@endsection