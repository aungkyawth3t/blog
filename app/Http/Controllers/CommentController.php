<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Mail\SubscriberMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $subscribers = $blog->subscribers->filter(fn ($subscriber) => $subscriber->id != auth()->id());
        $subscribers->each(function ($subscriber) use($blog) {
            Mail::to($subscriber->email)->queue(new SubscriberMail($blog));
        });
        return redirect('blogs/'.$blog->slug);
    }
}
