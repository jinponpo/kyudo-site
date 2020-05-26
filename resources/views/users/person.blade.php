<div class="card mt-3">
  <div class="card-body">
    <div class="d-flex flex-row">
      <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">
        <h3 class="card-title mt-2">
          <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">{{ $person->name }}</a>
        </h3>
      </a>
      @if( Auth::id() !== $person->id )
        <follow-button
          class="ml-auto"
          :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))'
          :authorized='@json(Auth::check())'
          endpoint="{{ route('users.follow', ['name' => $person->name]) }}"
        >
        </follow-button>
      @endif
    </div>
  </div>
</div>