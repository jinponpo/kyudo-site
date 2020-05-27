<nav class="navbar navbar-expand bg-light" style="opacity: 0.8;">
 <div class="container">
  <a class="navbar-brand h6 text-dark btn-border-bottom mr5" href="{{ url('/') }}">
    <!-- <img class='navbar-logo' src="{{ asset('images/logo.png') }}"> -->
    {{ config('app.name', 'JINTODO') }}
  </a>
  <div class="navbar-brand h6 text-dark">
    @auth
      {{Auth::user()->name}}さん
    @endauth
  </div>
  <form method="GET" action="/">
    <input type="text" name="keyword" class="width80">
    <input type="submit" value="本文検索">
  </form>
  <div id="nav-drawer">
    <input id="nav-input" type="checkbox" class="nav-unshown">
    <label id="nav-open" for="nav-input"><span></span></label>
    <label class="nav-unshown" id="nav-close" for="nav-input"></label>
    <div id="nav-content">
      <ul class="navbar-nav m-auto">
        @guest
        <li class="nav-item h6">
          <a class="nav-link btn-sf-like mr20" href="{{ route('register') }}">
            <i class="fas fa-users"></i>
            新規ユーザー登録
          </a>
        </li>
        @endguest
        
        @guest
        <li class="nav-item h6">
          <a class="nav-link btn-sf-like " href="{{ route('login') }}">
            <i class="fas fa-sign-in-alt"></i>
            ログイン
          </a>
        </li>
        @endguest
        
        @auth
        <li class="nav-item h6">
          <a class="nav-link btn-sf-like mr10" href="{{ route('articles.create') }}">
            <i class="fas fa-pen mr-1"></i>
            投稿する
          </a>
        </li>
        @endauth
        
        @auth
        <li class="nav-item h6">
          <a class="nav-link btn-sf-like" href='{{ route("users.show", ["name" => Auth::user()->name]) }}'>
            <i class="fas fa-user-circle"></i>
            マイページ
          </a>
        </li>
        @endauth
        
        @auth
        <li class="nav-item h6">
          <form name="form_name" method="POST" action="{{ route('logout') }}">
          @csrf
            <a class="nav-link btn-sf-like ml10" href="javascript:form_name.submit()">
              <i class="fas fa-sign-out-alt"></i>
              ログアウト
            </a>
          </form>
        </li>
        @endauth
      </ul>
    </div>
  </div>
 </div>
</nav>