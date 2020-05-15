@extends('layouts.app')

@section('content')
  <div class="container">
    @foreach($articles as $article)
      @include('card')
    @endforeach
  </div>
@endsection