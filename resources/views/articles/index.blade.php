@extends('layouts.app')

@section('content')
@include('search')
  <div class="container">
    <div class="row justify-content-center">
    @foreach($articles as $article)
      <div class="col-md-4">
        @include('card')
      </div>
    @endforeach
    </div>
    {{ $articles->appends(['keyword' => Request::get('keyword')])->links() }}
  </div>
@endsection