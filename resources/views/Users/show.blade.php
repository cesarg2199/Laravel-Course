@extends('layouts.app')
@section('title', 'User Profile')
@section('content')
        <div class="row">
            <div class="col-4">
                <img src="{{ $user->image ? $user->image->url() : '' }}" class="img-thumbnail avatar"/>
            </div>
            <div class="col-8">
                <h3>{{ $user->name }}</h3>

                @commentForm(['route' => secure_url(route('users.comments.store', ['user' => $user->id], config('app.http')))])
                @endcommentForm

                 @commentList(['comments' => $user->commentsOn])
                @endcommentList
            </div>
        </div>
@endsection