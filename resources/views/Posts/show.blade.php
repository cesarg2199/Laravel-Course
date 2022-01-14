@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="row">
    <div class="col-8">
        @if ($post->image)
            <div style="background-image: url('{{ $post->image->url() }}'); min-height: 500px; color:white; textx-align:center; background-attachment:fixed">
                <h1 style="padding-top: 100px; text-shadow: 1px 2px #000">
        @else
            <h1>
        @endif

            @badge(['show' => now()->diffInMinutes($post->created_at) < 50]) <!-- anything you pass inside the component get picked up by $slot, to pass addtional variables pass them in an array -->
                New!
            @endbadge
            {{ $post->title }}

        @if ($post->image)
            </>
        </div>
        @else
            </h1>
        @endif

        <p>{{ $post->content }}</p>

        @updated(['date' => $post->created_at, 'name' => $post->user->name])
        @endupdated

        @updated(['date' => $post->updated_at])
            Updated
        @endupdated

        @tags(['tags' => $post->tags])@endtags

        <h4>Comments</h4>

        @commentForm(['route' => secure_url(route('posts.comments.store', ['post' => $post->id], config('app.http')))])
        @endcommentForm

        @commentList(['comments' => $post->comments])
        @endcommentList
    </div>
    <div class="col-4">
        @include('Posts.partials.activity')
    </div>
</div>
@endsection
