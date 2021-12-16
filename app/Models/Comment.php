<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    // blog_post_id converts method name to reference id, unless you use second parameter 
    public function blogPost()
    {
        return $this->belongsTo('App\Models\BlogPost');
    }
}
