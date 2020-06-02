<nav class="navbar navbar-expand bg-blue">
  <div class="container search-nav">
    <ul class="navbar-nav m-auto">
      <li>
        <div>
          <p class="mb-3 mt-1 search-p">道場名で検索</p>
          <form method="GET" action="/">
          @csrf
          <input name="keyword" type="text" placeholder="日本武道館"/>
          <button type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </li>
    <li class="ml-3">
      <div>
        <p class="mb-3 mt-1 search-p">都道府県で検索</p>
        <form method="GET" action="/" class="">
        @csrf
        <select type="text" name="pref" required class="pref-search">
          @foreach(config('pref') as $key => $score)
          <option value="{{ $score }}">{{ $score }}</option>
          @endforeach
        </select>
        <button type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
    </li>
  </ul>
  </div>
</nav>