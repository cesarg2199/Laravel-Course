<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    //allows for setting records as deleted without actually deleting them
    use SoftDeletes;

    //how to do mass assingmnet with the create instance method 
    protected $fillable = ['title', 'content', 'user_id'];
    
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }    

    //model events
    public static function boot()
    {
        parent::boot();
        //this is important to make changes(deleting/restoring) to entities with foreign keys ties. 
        static::deleting(function (BlogPost $blogPost){
            $blogPost->comments()->delete();
        });

        static::restoring(function (BlogPost $blogPost){
            $blogPost->comments()->restore();
        });
    }


}
