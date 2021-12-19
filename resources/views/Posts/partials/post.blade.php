<h3>
    @if ($post->trashed())
        <del>
    @endif
    <a class="{{ $post->trashed() ? 'text-muted' : ''}}" href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
    @if ($post->trashed())
        </del>
    @endif
</h3>

<div class="mb-3">
    @updated(['date' => $post->created_at, 'name' => $post->user->name])
    @endupdated

    @tags(['tags' => $post->tags])@endtags

    @if($post->comments_count)
        <p>{{ $post->comments_count }} comments</p>
    @else
        <p>No comments yet.</p>
    @endif
    <!-- Edit btn -->
    @can('update', $post)
        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-warning">Edit</a>
    @endcan
    
     <!-- Delete btn -->
    @can('delete', $post)
        @if (!$post->trashed())
            <form class="d-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger"/>
            </form>  
        @endif
    @endcan
    
</div>