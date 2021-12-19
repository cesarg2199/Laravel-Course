 <form  method="POST">
    @csrf

    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control">{{ old('content', optional($post ?? null)->content) }}</textarea>
    </div>

    <div><input type="submit" value="Add Comment" class="btn btn-primary btn-block"/></div>
</form>