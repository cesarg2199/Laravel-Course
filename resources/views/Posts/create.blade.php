@extends('layouts.app')

@section('title', 'Create New Post')

@section('content')
    <form action="{{ secure_url(route('posts.store', [], config('app.http'))) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('Posts.partials.form')
        <div><input type="submit" value="Create" class="btn btn-primary btn-block"/></div>
    </form>
@endsection
