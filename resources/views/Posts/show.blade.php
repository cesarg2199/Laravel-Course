@extends('layouts.app')

@section('title', $post['title'])

@section('content')
@if($post['is_new'])
<div>This is a new blog post</div>
@else
<div>This is an old post</div>
@endif
@unless ($post['is_new'])
    <div>It is an old blog post using unless</div>
@endunless

    <h1>{{ $post['title']}} </h1>
    <p>{{ $post['content'] }}</p>

@isset($post['has_comments'])
   <div>This blog posts has some comments</div> 
@endisset

@endsection