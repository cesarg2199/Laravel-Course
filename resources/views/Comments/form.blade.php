<div class="mb-2 mt-2">
    @auth
        <form method="POST">
            @csrf
            <div class="form-group">
                <textarea name="content" class="form-control"></textarea>
            </div>

            <div><input type="submit" value="Add Comment" class="btn btn-primary btn-block"/></div>
        </form>
    @else
    <a href="{{ secure_url(route('login', [], config('app.http'))) }}">Sign-in</a> to post comments!
    @endauth
    <hr />
</div>
