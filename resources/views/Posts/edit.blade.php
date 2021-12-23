@extends('layouts.app')

@section('title', 'Update Post')
    @section('content')
        <form action="{{ secure_url(route('posts.update', ['post' => $post->id], config('app.http'))) }}" method="POST">
            @csrf
            @method('PUT')
            @include('Posts.partials.form')
            <div><input type="submit" value="Update" class="btn btn-primary btn-block"/></div>
        </form>
    @endsection
