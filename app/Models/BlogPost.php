<?php

namespace App\Models;

use App\Scopes\DeletedAdminScope;
//use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    //this tells the model that the soft deletes column is enabled in the database
    use SoftDeletes;

    //how to do mass assingmnet with the create instance method 
    protected $fillable = ['title', 'content', 'user_id'];
    
    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->latest();
    }

    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    /*Scope functionality(custom queries on model)*/
    //call as latest()
    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    } 

    //call it as mostCommented()
    public function scopeMostCommented(Builder $query)
    {
        return $query->withCount('comments')->orderBy('comments_count', 'desc');
    }

    //good to use when using the same queiries in multiple areas 
    public function scopeLatestWithRelations(Builder $query)
    {
        return $query->latest()->withCount('comments')->with('user')->with('tags');
    }

    //model events
    public static function boot()
    {
        static::addGlobalScope(new DeletedAdminScope);

        parent::boot();

        //static::addGlobalScope(new LatestScope);

        //this is important to make changes(deleting/restoring) to entities with foreign keys ties. 
        static::deleting(function (BlogPost $blogPost){
            $blogPost->comments()->delete();
        });

        static::restoring(function (BlogPost $blogPost){
            $blogPost->comments()->restore();
        });
    }


}
