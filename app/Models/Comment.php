<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // blog_post_id converts method name to reference id, unless you use second parameter 
    public function blogPost()
    {
        return $this->belongsTo('App\Models\BlogPost');
    }
}