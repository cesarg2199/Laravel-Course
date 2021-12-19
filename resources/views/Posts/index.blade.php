@extends('layouts.app')

@section('title', 'All Blog Posts')

@section('content')
{{-- MULTI LINE COMMENT IS OPTION + SHIFT + A --}}
<div class="row">
    <div class="col-8">
    @forelse ($posts as $key => $post)
        @include('Posts.partials.post')
        @empty
                <p>No Posts Found</p> 
    @endforelse
    </div>
    <div class="col-4">
        @include('Posts.partials.activity')
    </div>
</div>
@endsection