@extends('layouts.app')

@section('content')
  <div class="container">
    @include('users.user')
    <div class=" mt-3 md-3 ml-3 h4">フォロワー一覧</div>
    @foreach($followers as $person)
      @include('users.person')
    @endforeach
  </div>
@endsection