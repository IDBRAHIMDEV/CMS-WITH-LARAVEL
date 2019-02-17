<?php

namespace App\Http\Controllers\Site;
use App\Post, App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index() {
        
       return redirect()->route('site.blog');
    }


    public function blog() {
       
       $posts = Post::paginate(5);
    
       return view('site.blog')->with('posts', $posts);
    }

    public function contact() {
        return view('site.contact');
    }

    public function show() 
    {

    }

    public function storeContact(Request $request) {
        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->object = $request->object;
        $contact->message = $request->message;

        $contact->save();

        return "ok";
    }
}
