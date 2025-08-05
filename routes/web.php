<?php

use App\Models\User;
use App\Models\Category;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminBlogController;

Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->where('blog', '[A-z\d\-_]+');

Route::post('blogs/{blog:slug}/comments', [CommentController::class, 'store'])->name('blogs.comments.store');

// Route::get('users/{user:username}', function (User $user) {
//     return view('blogs' , [
//         'blogs' => $user->blogs
//     ]);
// });

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'storeLogin'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::post('/blogs/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandler']);
Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->middleware(isAdmin::class);
Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->middleware(isAdmin::class);
Route::post('/admin/blogs/create', [AdminBlogController::class, 'store'])->name('blogs.store')->middleware('isAdmin');
