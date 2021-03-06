@extends('layouts.app')
@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ secure_url(route('users.update', ['user' => $user->id], config('app.http'))) }}" class="form-horizontal">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-4">
                <img src="{{ $user->image ? $user->image->url() : '' }}" class="img-thumbnail avatar"/>
                <div class="card mt-4">
                    <div class="card-body">
                        <h6>Upload photo</h6>
                        <input class="form-control-file" type="file" name="avatar" />
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label>Name:</label>
                    <input class="form-control" value="" type="text" name="name" />
                </div>
                @errors @enderrors
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save" />
                </div>
            </div>
        </div>
    </form>
@endsection