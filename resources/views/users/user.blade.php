<div class="mt40 mb40">
  <div class="row">
    <div class="col-md-4 text-center">
      @if(!empty($user->image))
      <div class='image-wrapper'>
          <img class='round-img' src="{{ $user->image }}">
        </a>
      </div>
      @else
        <div class='image-wrapper'>
            <img class='round-img' src="{{ asset('images/blank_profile.png') }}">
          </a>
        </div>
      @endif
      </div>
      <div class="col-md-8">
      <div class="row">
        <h1>
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            {{ $user->name }}
          </a>
        </h1>

        @if( Auth::id() == $user->id )
          <a href="{{ route('users.edit', ['name' => $user->name]) }}" class="btn btn-outline-dark common-btn ml-auto mr-auto" >プロフィールを編集</a>
        @endif

        @if( Auth::id() !== $user->id )
          <follow-button
            class="mauto"
            :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
            :authorized='@json(Auth::check())'
            endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
          >
          </follow-button>
        @endif
      </div>

      <div class="row">
          <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted h4 mt20 mr20">
            {{ $user->count_followings }} フォロー
          </a>
          <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted h4 mt20">
            {{ $user->count_followers }} フォロワー
          </a>
        </div>
      </div>
    </div>
  </div>