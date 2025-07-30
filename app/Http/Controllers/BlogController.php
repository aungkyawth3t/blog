<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index ()
    {
        return view('blogs.index', ['blogs' => Blog::latest()
                ->filter(request(['search', 'category', 'username']))
                ->paginate(6)
                ->withQueryString()
            ]);
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function show(Blog $blog) 
    {
        return view('blogs.show', ['blog' => $blog,'randomBlogs' => Blog::inRandomOrder()->take(3)->get()]);
    }

    public function subscriptionHandler(Blog $blog)
    {
        if(auth()->user()->isSubscribed($blog)){
            $blog->unSubscribe();
        } else {
            $blog->subscribe();
        }
        return back();
    }
}
