<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', optional($post ?? null)->title) }}"/>
</div>
<!-- show error by input parameter -->
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" class="form-control">{{ old('content', optional($post ?? null)->content) }}</textarea>
</div>
<!-- good way to show all errors on page -->
@if ($errors->any())
    <div class="mb-3">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif