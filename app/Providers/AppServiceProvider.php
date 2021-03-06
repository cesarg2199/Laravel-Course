<?php

namespace App\Providers;

use App\Http\ViewComposers\ActivityComposer;
use App\Models\BlogPost;
use App\Models\Comment;
use App\Observers\BlogPostObserver;
use App\Observers\CommentObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //for morphs
        Schema::defaultStringLength(191);

        //This is for registering new blade tags param1 = filepath, param2 = tag name
        Blade::aliasComponent('components.badge', 'badge');
        Blade::aliasComponent('components.updated', 'updated');
        Blade::aliasComponent('components.card', 'card');
        Blade::aliasComponent('components.tags', 'tags');
        Blade::aliasComponent('components.errors', 'errors');
        Blade::aliasComponent('components.comment-form', 'commentForm');
        Blade::aliasComponent('components.comment-list', 'commentList');

        //view composer function. This allows for passing the same varibles automatically without having to pass it explicity
        view()->composer(['Posts.index', 'Posts.show'], ActivityComposer::class);
        //how to universally apply it to all views
        //view()->composer('*', ActivityComposer::class);

        //this is how i can implement logging into the app without having to do it in the controllers or models. this is great
        //this automatically calls the corresponding observer class on the model
        BlogPost::observe(BlogPostObserver::class);
        Comment::observe(CommentObserver::class);
    }
}
