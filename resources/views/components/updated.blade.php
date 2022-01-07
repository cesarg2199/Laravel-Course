<p class="text-muted">
    {{ empty(trim($slot)) ? 'Added ' : $slot }} {{ $date->diffForHumans(); }}
    @if (isset($name))
        @if (isset($userId))
            by <a href=" {{ secure_url(route('users.show', ['user' => $userId], config('app.http'))) }}">{{ $name }}</a>
        @else
            by: {{ $name }}        
        @endif
    @endif
</p>