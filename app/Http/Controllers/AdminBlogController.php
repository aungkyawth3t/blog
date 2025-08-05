<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    public function store()
    {
        $path = request()->file('thumbnail')->store('thumbnails');
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
        $validatedFormData['thumbnail'] = $path;
        Blog::create($validatedFormData);
        return redirect('/')->with('success', 'Blog posted successfully');
    }
}
