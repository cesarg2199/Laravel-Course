<?php

namespace App\Models;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    //how to do mass assingmnet with the create instance method 
    protected $fillable = ['content', 'user_id'];

    // blog_post_id converts method name to reference id, unless you use second parameter 
    public function blogPost()
    {
        return $this->belongsTo('App\Models\BlogPost');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }  

    public static function boot()
    {
        parent::boot();

        //static::addGlobalScope(new LatestScope);
    }
}
