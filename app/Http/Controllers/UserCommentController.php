<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStore;
use App\Models\User;

class UserCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

    #Using route-model binding by passing the type hinted class with variable as same name on route list
    public function store(User $user, CommentStore $request)
    {
        $user->commentsOn()->create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id
        ]);

        $request->session()->flash('status', 'Comment was created!');

        return redirect()->back();
    }
}
