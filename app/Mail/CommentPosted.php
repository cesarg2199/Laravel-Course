<?php

namespace App\Mail;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentPosted extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "New comment on your {$this->comment->commentable->title} blog post";

        return $this
                /* Test of attacing files to outgoing email 
                ->attach(
                    storage_path('app/public').'/'.$this->comment->user->image->path,
                    [
                        'as' => 'avatar.png',
                        'mime' => 'image/png'
                    ]
                )
                ->attachFromStorage($this->comment->user->image->path, "profile_pic.png")
                */
                ->subject($subject)
                ->view('emails.posts.commented');
    }
}
