@if (session('flash_message'))
    <div class="flash_message bg-success text-center py-3 mt-2 mb-1">
        {{ session('flash_message') }}
    </div>
@endif