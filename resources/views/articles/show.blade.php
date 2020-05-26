@extends('layouts.app')

@section('content')
<div class="container">
  <div class="text-align-center h1 mt10 mb20">
    〜投稿詳細ページ〜
  </div>
    @include('card')
    <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key=AIzaSyBQCqrHT55gPe0VRd0x_WGbXl7PWFmObEE&amp;q={{ $article->body }}'
      class='mt60' width='100%' height='480' frameborder='0'>
    </iframe>
  </div>
@endsection