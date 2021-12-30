<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', optional($post ?? null)->title) }}"/>
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" class="form-control">{{ old('content', optional($post ?? null)->content) }}</textarea>
</div>

<div class="form-group">
    <label for="title">Thumbnail</label>
    <input type="file" name="thumbnail" class="form-control-file"/>
</div>

@errors
<!-- Displaying errors from component -->
@enderrors
