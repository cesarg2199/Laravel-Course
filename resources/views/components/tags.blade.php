<p>
    @foreach ($tags as $tag)
        <a href="{{ secure_url(route('posts.tags.index', ['tag' => $tag->id], false)) }}" class="badge badge-success badge-lg">{{ $tag->name; }}</a>
    @endforeach
</p>
