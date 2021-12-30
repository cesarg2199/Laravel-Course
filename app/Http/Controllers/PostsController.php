<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStore;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


//use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //->only(['create', 'store', 'edit', 'update', 'destroy']); protect certain routes inside controller
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* DB::connection()->enableQueryLog();

        $posts = BlogPost::all();

        foreach($posts as $post) {
            foreach($post->comments as $comment) {
                echo $comment->content;
            }
        }

        dd(DB::getQueryLog()); */

        // withCount adds new property comments_count
        return view('Posts.index', [
            'posts' => BlogPost::latestWithRelations()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('posts.create');
        return view('Posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStore $request)
    {
        
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;
        $post = BlogPost::create($validated);

        //Create new blogpost instance and save it to the database. 
        /*$post = new BlogPost();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = Auth::user()->id;
        $post->save(); */

        $request->session()->flash('status', 'This blog post was created!');

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$this->authorize('view', BlogPost::findOrFail($id));
        return view('Posts.show', ['post' => BlogPost::with('comments', 'tags', 'user', 'comments.user')->findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);

        /*if (Gate::denies('update-post', $post)) {
            abort(403, "You can't edit bitch");
        }*/

        $this->authorize('update', $post);


        return view('Posts.edit', ['post' => $post]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostStore $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        $validated = $request->validated();
        $post->fill($validated);
        $post->save();
        
        $request->session()->flash('status', 'Blog post was updated!');

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);

        /*if (Gate::denies('delete-post', $post)) {
            abort(403, "You can't delete this blog post");
        }*/

        $this->authorize($post);

        $post->delete();

        session()->flash('status', 'Blog post was deleted');

        return redirect()->route('posts.index');
    }
}
