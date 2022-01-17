<?php

namespace App\Observers;

use App\Jobs\LogPostCreated;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Log;

class BlogPostObserver
{
    public function created(BlogPost $blogPost)
    {
        Log::channel('customlog')->info('BLOGPOST OBSERVER CREATED TRIGGERED');
        //LogPostCreated::dispatch();
    }

    public function deleting(BlogPost $blogPost)
    {
        $blogPost->comments()->delete();
    }

    public function restoring(BlogPost $blogPost)
    {
        $blogPost->comments()->restore();
    }
}
