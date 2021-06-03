<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('Home.index');
})

//Adding names to parameters makes easier to manage later
Route::get('/contact', function(){
    return view('Home.contact');
})
*/

Route::view('/', 'Home.index')->name('Home.index');

Route::view('/contact', 'Home.contact')->name('Home.contact');

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
    return view('Posts.index', ['posts' => $posts]);
});

//Required Parameter along with on the fly parameter checking with regex 
Route::get('/posts/{id}', function($id) use($posts) {
    abort_if(!isset($posts[$id]), 404);
    return view('Posts.show', ['post' => $posts[$id]]);
})->name('Posts.show');

//Optional Parameter
Route::get('/recent-posts/{days_ago?}', function($daysAgo = 5){
    return 'Posts from '.$daysAgo.' days ago.';
})->name('Posts.recent.index');

//Return json data the long way
Route::get('fun/responses', function() use($posts) {
    //Response object to return json data, the long way
    return response($posts, 201)
    ->header('Content-Type', 'application/json')
    ->cookie('MY_COOKIE', 'Pior Jura', 900);
});

/* Route helper methods */
Route::get('fun/redirect', function() {
    return redirect('/contact');
});

Route::get('fun/back', function() {
    return back();
});

Route::get('fun/named-route', function() {
    return redirect()->route('Posts.show', ['id' => 1]);
});

Route::get('fun/away', function() {
    return redirect()->away('https://www.google.com');
});

//Simple way to return json data 
Route::get('fun/json', function() use($posts) {
    return response()->json($posts);
});

//force download
Route::get('fun/download', function() use($posts) {
    return response()->download('');
});

/* end of route helper methods */