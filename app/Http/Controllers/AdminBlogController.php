<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
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

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('success', 'Blog deleted');
    }
}
