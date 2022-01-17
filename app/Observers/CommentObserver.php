<?php

namespace App\Observers;

use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function creating(Comment $comment)
    {
        $name = $comment->commentable->user->name;
        $id = $comment->commentable->user->id;
        $blogPostId = $comment->commentable->id;

        $message = "{$id} - {$name} added a comment to blog post {$blogPostId}";
        //Log::channel('customlog')->info('Hello world!!');
        //Log::info($message);
    }
}
