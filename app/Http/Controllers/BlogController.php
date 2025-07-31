<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    public function store()
    {
        $validatedFormData = request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'intro' => ['required','max:20'],
            'body' => ['required', 'min:10']
        ], [
            'category_id.required' => 'category is required!'
        ]);
        
        $validatedFormData['user_id'] = auth()->user()->id;
        Blog::create($validatedFormData);
        return redirect('/')->with('success', 'Blog posted successfully');
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
