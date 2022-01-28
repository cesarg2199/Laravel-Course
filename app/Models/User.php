<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogPosts()
    {
        return $this->hasMany('App\Models\BlogPost');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function loginAttemps()
    {
        return $this->hasMany('App\Models\Logs\LogLogin');
    }

    public function commentsOn()
    {
        return $this->morphMany('App\Models\Comment', 'commentable')->latest();
    }

    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function scopeWithMostBlogPosts(Builder $query)
    {
        return $query->withCount('blogPosts')->orderBy('blog_posts_count', 'desc');
    }

    public function scopeWithMostBlogPostsLastMonth(Builder $query)
    {
        return $query->withCount(['blogPosts' => function (Builder $query) {
            $query->whereBetween(static::CREATED_AT, [now()->subMonths(1), now()]);
        }])->having('blog_posts_count', '>=', 2)
           ->orderBy('blog_posts_count', 'desc');
    }

    public function scopeThatHasCommentedOnPost(Builder $query, BlogPost $post)
    {
        return $query->whereHas('comments', function($query) use ($post) {
            return $query->where('commentable_id', '=', $post->id)
                         ->where('commentable_type', '=', BlogPost::class);
        });
    }
}
