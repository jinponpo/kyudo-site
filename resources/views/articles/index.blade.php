@extends('layouts.app')

@section('content')
  <div class="container">
    @foreach($articles as $article)
      @include('card')
    @endforeach
    {{ $articles->appends(['keyword' => Request::get('keyword')])->links() }}
  </div>
@endsection