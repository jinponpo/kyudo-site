@extends('layouts.app')

@section('content')
  <div class="container">
    @include('card')
    <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key=AIzaSyBQCqrHT55gPe0VRd0x_WGbXl7PWFmObEE&amp;q=東京　渋谷駅'
      class='mt60' width='100%' height='480' frameborder='0'>
    </iframe>
  </div>
@endsection