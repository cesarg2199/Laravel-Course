<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostTagController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])
->name('Home.index');
//->middleware('auth'); protect by specific route

Route::get('/contact', [HomeController::class, 'contact'])
->name('Home.contact');

Route::get('/secret', [HomeController::class, 'secret'])
->name('Home.secret')
->middleware('can:home.secret');

Route::get('/about', [AboutController::class, 'index'])
->name('About.index');

Route::resource('posts', PostsController::class);
//->only(['index', 'show', 'create', 'store', 'edit', 'update']);
//Route::resource('posts', PostsController::class)->except(['index', 'show']);

Route::get('posts/tag/{tag}', [PostTagController::class, 'index'])->name('posts.tags.index');

Route::resource('posts.comments', PostCommentController::class)->only('store');

Auth::routes();

/*
Route::get('/', function () {
    return view('Home.index');
})

//Adding names to parameters makes easier to manage later
Route::get('/contact', function(){
    return view('Home.contact');
})
*/
/*
$posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel',
            'is_new' => FALSE,
            'has_comments' => TRUE
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP',
            'is_new' => True            
        ],
        3 => [
            'title' => 'Cesar Guerrero',
            'content' => 'This is a short intro to Laravel learning.',
            'is_new' => True            
        ]
    ];

Route::get('posts/', function() use($posts) {
    //dd(request()->all());
    dd((int)request()->query('page', 1);
    return view('Posts.index', ['posts' => $posts]);
})->name('Posts.home');

//Required Parameter along with on the fly parameter checking with regex 
Route::get('/posts/{id}', function($id) use($posts) {
    abort_if(!isset($posts[$id]), 404);
    return view('Posts.show', ['post' => $posts[$id]]);
})->name('Posts.show');

//Optional Parameter
Route::get('/recent-posts/{days_ago?}', function($daysAgo = 5){
    return 'Posts from '.$daysAgo.' days ago.';
})->name('Posts.recent.index')->middleware('auth'); 

//Route Grouping Example
Route::prefix('/fun')->name('fun.')->group(function() use($posts) {
    //Return json data the long way
    Route::get('responses', function() use($posts) {
        //Response object to return json data, the long way
        return response($posts, 201)
        ->header('Content-Type', 'application/json')
        ->cookie('MY_COOKIE', 'Pior Jura', 900);
    })->name('responses');

    // Route helper methods
    Route::get('redirect', function() {
        return redirect('/contact');
    })->name('redirect');

    Route::get('back', function() {
        return back();
    })->name('back');

    Route::get('named-route', function() {
        return redirect()->route('Posts.show', ['id' => 1]);
    })->name('named-route');

    Route::get('away', function() {
        return redirect()->away('https://www.google.com');
    })->name('away');

    //Simple way to return json data 
    Route::get('json', function() use($posts) {
        return response()->json($posts);
    })->name('json');

    //force download
    Route::get('download', function() use($posts) {
        return response()->download(public_path('logo.jpg'), 'LOGO.jpg');
    })->name('download');
    // end of route helper methods 
}); */