<?php

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $blogs = Blog::latest();
    if(request('search')){
        $blogs = $blogs->where('title', 'LIKE', '%'.request('search').'%');
    }
    return view('blogs', ['blogs' => $blogs->get(), 'categories' => Category::all()]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) { //Blog::findOrFail($id)
    return view('blog', ['blog' => $blog,'randomBlogs' => Blog::inRandomOrder()->take(3)->get()]);
})
->where('blog', '[A-z\d\-_]+');

Route::get('categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        'blogs' => $category->blogs,
        'categories' => Category::all(),
        'currentCategory' => $category
    ]);
});

Route::get('users/{user:username}', function (User $user) {
    return view('blogs' , [
        'blogs' => $user->blogs
    ]);
});
