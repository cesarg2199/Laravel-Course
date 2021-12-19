<?php

namespace App\Providers;

use App\Models\BlogPost;
use App\Policies\BlogPostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //Can either do it with file path or class 
        //'App\BlogPost' => 'App\Policies\BlogPostPolicy'
        BlogPost::class => BlogPostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('home.secret', function($user){
            return $user->is_admin;
        });

        //This will allow admins to override any previously defined gate
        Gate::before(function($user, $ability){
        if($user->is_admin && in_array($ability, ['delete', 'update'])) {
        return true;
        }
        });


        /*$user is always provided by laravel which is always the currently authenticated user 
        Gate::define('update-post', function($user, $post){
            return $user->id == $post->user_id;
        });

        Gate::define('delete-post', function ($user, $post) {
            return $user->id == $post->user_id;
        });
        */

        //Gate::define('posts.update', 'App\Policies\BlogPostPolicy@update');
        //Gate::define('posts.delete', 'App\Policies\BlogPostPolicy@delete');

        //Gate::resource('posts', 'App\Policies\BlogPostPolicy');
        //if using crud this will auto matach them with ie posts.update, posts.delete, posts.create etc
        
    }
}
