<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs', [
        'blogs' => Blog::all()
    ]);
});

Route::get('/blogs/{blog}', function ($slug) {
    $blog = Blog::findOrFail($slug);
    return view('blog', [
        'blog' => $blog
    ]);
})->where('blog', '[A-z\d\-_]+');
