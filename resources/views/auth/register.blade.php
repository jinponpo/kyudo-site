@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">新規ユーザー登録</h2>
              <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="btn btn-block btn-danger">
                <i class="fab fa-google mr-1"></i>Googleで登録
              </a>
              <a href="{{ route('login.{provider}', ['provider' => 'facebook']) }}" class="btn btn-block btn-primary mt10">
                <i class="fab fa-facebook mr-1"></i>Facebookで登録
              </a>
              <a href="{{ route('login.{provider}', ['provider' => 'twitter']) }}" class="btn btn-block btn-info mt10">
                <i class="fab fa-twitter mr-1"></i>Twitterで登録
              </a>
            @include('error_card_list')
            <div class="card-text">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="md-form">
                  <label for="name">ユーザー名</label>
                  <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
                </div>
                <div class="md-form">
                  <label for="email">メールアドレス</label>
                  <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" >
                </div>
                <div class="md-form">
                  <label for="password">パスワード</label>
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <div class="md-form">
                  <label for="password_confirmation">パスワード(確認)</label>
                  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button class="btn btn-block btn-primary mt-2 mb-2" type="submit">ユーザー登録</button>
              </form>
              <div class="mt-0">
                <a href="{{ route('login') }}" class="card-text">ログインはこちら</a>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-5">
          <a href='{{ route('login.guest') }}' class="btn btn-block btn-secondary mt-2 mb-2">簡単ログインはこちら</a>
        </div>
      </div>
    </div>
  </div>
@endsection