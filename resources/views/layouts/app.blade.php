<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <title>Laravel App - @yield('title')</title>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shawdow-sm mb-3">
        <h5 class="my-0 mr-md-auto font-weight-normal">Laravel App</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            @guest
                @if (Route::has('register'))
                    <a class="p-2 text-dark" href="{{ secure_url(route('register', [], false)) }}">Register</a>
                @endif
                <a class="p-2 text-dark" href="{{ secure_url(route('login', [], false)) }}">Login</a>
            @else
                <a class="p-2 text-dark" href="{{ secure_url(route('Home.index', [], false)) }}">Home</a>
                <a class="p-2 text-dark" href="{{ secure_url(route('Home.contact', [], false)) }}">Contact</a>
                <a class="p-2 text-dark" href="{{ secure_url(route('About.index', [], false)) }}">About</a>
                <a class="p-2 text-dark" href="{{ secure_url(route('posts.index', [], false)) }}">Blog Posts</a>
                <a class="p-2 text-dark" href="{{ secure_url(route('posts.create', [], false)) }}">Add</a>
                <a class="p-2 text-dark" href="{{ secure_url(route('logout', [], false)) }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout ({{ Auth::user()->name }})</a>
                <form id="logout-form" action={{ secure_url(route('logout', [], false)) }} method="POST" style="display:none">@csrf</form>
            @endguest

        </nav>
    </div>
    <div class="container">
        @if (session('status'))
           <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
     </div>
</body>
</html>
