<nav class="navbar navbar-expand bg-light fixed-top" style="opacity: 0.8;">
  <a class="navbar-brand ml-auto h6 text-dark btn-border-bottom" href="{{ url('/') }}">
    <img class='navbar-logo' src="{{ asset('images/logo.png') }}">
    {{ config('app.name', 'JINTODO') }}
  </a>
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
      <a class="nav-link btn-sf-like mr10" href="#">
        <i class="fas fa-pen mr-1"></i>
        投稿する
      </a>
    </li>
    @endauth
    
    @auth
    <li class="nav-item h6">
      <a class="nav-link btn-sf-like " href="#">
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
</nav>