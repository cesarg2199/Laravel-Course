<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStore;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

    #Using route-model binding by passing the type hinted class with variable as same name on route list
    public function store(BlogPost $post, CommentStore $request)
    {
        $post->comments()->create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id
        ]);

        $request->session()->flash('status', 'Comment was created!');

        return redirect()->back();
    }
}
