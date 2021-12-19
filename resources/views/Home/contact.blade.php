@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <h1 class="text-center">Contact Page</h1>

    @can('home.secret')
        <a href="{{ route('Home.secret') }}">Secret Page</a>
    @endcan
@endsection