@extends('layouts.app')

@section('title', 'All Blog Posts')

@section('content')
{{-- MULTI LINE COMMENT IS OPTION + SHIFT + A --}}
        @forelse ($posts as $key => $post)
            @include('Posts.partials.post')
            @empty
                 <p>No Posts Found</p> 
        @endforelse
@endsection