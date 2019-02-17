<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Session;
use Auth;
use App\Post, App\Category, App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->admin ? Post::all() : Auth::user()->posts;
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all(); 
       return view('admin.posts.create', [
                    'categories' => $categories,
                    'tags' => $tags
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'category_id' => 'required|numeric'
        ]);

      
        $post = new Post;
        $post->title = $request->title;
        $post->user_id = Auth::user()->id;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->attach($request->tags);

        //Post::create($request->except('_token'));
        
        Session::flash('success', 'This posts is created successfully ');
        return redirect('admin/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return 'show post';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', [
                    'categories' => $categories, 
                    'post' => $post,
                    'tags' =>  $tags
                  ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->sync($request->tags);
        
        Session::flash('success', 'Post Updated successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash('info', 'Post deleted');
        return redirect()->route('post.trashed');
    }

    public function trashed() {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed', ['posts' => $posts]);
    }

    public function restore($id) {
       $post = Post::withTrashed()->where('id', $id)->first();
       $post->restore();

       Session::flash('info', 'Post restored');
       return redirect()->route('post.index');
    }
}
