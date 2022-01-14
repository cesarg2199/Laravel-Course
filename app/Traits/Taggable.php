<?php

namespace App\Traits;

use App\Models\Tag;

trait Taggable 
{
    protected static function bootTaggable()
    {
        static::updating(function ($model){
            $model->tags()->sync(static::findTagsInContent($model->content));
        });

        static::created(function ($model){
            $model->tags()->sync(static::findTagsInContent($model->content));
        });
    }

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable')->withTimestamps();
    }

    private static function findTagsInContent($content)
    {
        preg_match_all('/@([^@]+)@/m', $content, $tags);

        //tags[0] = full match, tags[1] = group matches
        return Tag::whereIn('name', $tags[1] ?? [])->get();
    }
}