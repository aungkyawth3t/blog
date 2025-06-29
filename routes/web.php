<?php

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs', [
        'blogs' => Blog::with('category')->get() //eager load //lazy loading
    ]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) { //Blog::findOrFail($id)
    return view('blog', [
        'blog' => $blog
    ]);
})->where('blog', '[A-z\d\-_]+');

Route::get('categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        'blogs' => $category->blogs
    ]);
});

Route::get('blogs/author/{id}', function (User $user) {
    return view('user', [
        'user' => $user->id
    ]);
});
