<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog) //route model binding
    {
        // validation
        request()->validate([
            'body' => 'required',
        ], [
            'body.required' => 'Please write something first!',
        ]);
        // comment store
        $blog->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);
        return back();
    }
}
