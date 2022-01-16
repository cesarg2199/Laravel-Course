<?php

namespace App\Observers;

use App\Models\BlogPost;

class BlogPostObserver
{
    public function deleting(BlogPost $blogPost)
    {
        $blogPost->comments()->delete();
    }

    public function restoring(BlogPost $blogPost)
    {
        $blogPost->comments()->restore();
    }
}
