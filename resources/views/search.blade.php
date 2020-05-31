<nav class="navbar navbar-expand bg-blue">
  <div class="container search-nav">
   <ul class="navbar-nav m-auto">
    <li>
      <form method="GET" action="/">
      @csrf
        <input name="keyword" type="text" placeholder="店名で検索"/>
        <button type="submit"><i class="fas fa-search"></i></button>
      </form>
    </li>
    <li>
      <form method="GET" action="/" class="ml-3">
      @csrf
      <select type="text" name="pref" required class="pref-search">
        @foreach(config('pref') as $key => $score)
        <option value="{{ $score }}">{{ $score }}</option>
        @endforeach
      </select>
      <button type="submit"><i class="fas fa-search"></i></button>
      </form>
    </li>
  </div>
</nav>