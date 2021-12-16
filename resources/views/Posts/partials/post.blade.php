<h3><a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a></h3>

<div class="mb-3">
    <p>Added: {{ $post->created_at->diffForHumans() }}</p>
    <p>by: {{ $post->user->name }}</p>

    @if($post->comments_count)
        <p>{{ $post->comments_count }} comments</p>
    @else
        <p>No comments yet.</p>
    @endif
    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-warning">Edit</a>
    <form class="d-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" class="btn btn-danger"/>
    </form>
</div>