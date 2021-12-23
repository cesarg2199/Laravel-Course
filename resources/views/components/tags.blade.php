<p>
    @foreach ($tags as $tag)
        <a href="{{ secure_url(route('posts.tags.index', ['tag' => $tag->id], config('app.http'))) }}" class="badge badge-success badge-lg">{{ $tag->name; }}</a>
    @endforeach
</p>
