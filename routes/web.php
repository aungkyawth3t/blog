<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->where('blog', '[A-z\d\-_]+');

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
