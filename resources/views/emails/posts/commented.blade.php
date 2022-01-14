<style>
    body {
        font-family: Arial, Arial, Helvetica, sans-serif;
    }
</style>

<p>
    Hi {{ $comment->commentable->user->name }}
</p>

<p>
    Someone has commented on your blog post
    <a href="{{ secure_url(route('posts.show', ['post' => $comment->commentable->id], config('app.http'))) }}">
        {{ $comment->commentable->title }}
    </a>
</p>

<hr />

<p>
    <a href="{{ secure_url(route('users.show', ['user' => $comment->user->id], config('app.http'))) }}">
        {{ $comment->user->name }}
    </a>
</p>

<p>
    {{ $comment->content }}
</p>