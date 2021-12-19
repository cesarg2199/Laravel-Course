@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="row">
    <div class="col-8">
        <h1>
            @badge(['show' => now()->diffInMinutes($post->created_at) < 50]) <!-- anything you pass inside the component get picked up by $slot, to pass addtional variables pass them in an array -->
                New! 
            @endbadge
            {{ $post->title }}
        </h1>
        <p>{{ $post->content }}</p>
        @updated(['date' => $post->created_at, 'name' => $post->user->name])
        @endupdated

        @updated(['date' => $post->updated_at])
            Updated
        @endupdated

        @tags(['tags' => $post->tags])@endtags

        <h4>Comments</h4>
        @forelse ($post->comments as $comment)
            <p>{{ $comment->content; }}</p>
            @updated(['date' => $comment->created_at, 'name' => $comment->user->name])
            @endupdated
        @empty
            <p>No comments yet!</p>
        @endforelse
    </div>
    <div class="col-4">
        @include('Posts.partials.activity')
    </div>
</div>
@endsection