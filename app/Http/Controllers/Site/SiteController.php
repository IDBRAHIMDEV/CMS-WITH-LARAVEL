<?php

namespace App\Http\Controllers\Site;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index() {
        
       return view('site.index');
    }


    public function blog() {
       
       $posts = Post::paginate(5);
    
       return view('site.blog')->with('posts', $posts);
    }

    public function contact() {

    }

    public function show() 
    {

    }
}
