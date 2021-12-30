<?php

namespace App\Providers;

use App\Http\ViewComposers\ActivityComposer;
use Illuminate\Support\Facades\Blade;
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
        //This is for registering new blade tags param1 = filepath, param2 = tag name
       Blade::aliasComponent('components.badge', 'badge');
       Blade::aliasComponent('components.updated', 'updated');
       Blade::aliasComponent('components.card', 'card');
       Blade::aliasComponent('components.tags', 'tags');
       Blade::aliasComponent('components.errors', 'errors');

        //view composer function. This allows for passing the same varibles automatically without having to pass it explicity
        view()->composer(['Posts.index', 'Posts.show'], ActivityComposer::class);
        //how to universally apply it to all views
        //view()->composer('*', ActivityComposer::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
