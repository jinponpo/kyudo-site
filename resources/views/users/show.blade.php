@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card mt-3">
      <div class="card-body">
        <h2 class="h5 card-title m-0">
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            {{ $user->name }}
          </a>
        </h2>
      </div>
    </div>
      <div class="nav-item">
        <a class="nav-link text-muted active"
          href="{{ route('users.show', ['name' => $user->name]) }}">
          投稿一覧
        </a>
      </div>
    @foreach($articles as $article)
      @include('card')
    @endforeach
  </div>
@endsection