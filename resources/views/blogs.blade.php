@extends('layout')
@section('title', 'Blogs')
@section('content')

    @foreach ($blogs as $blog)
    {{-- @dd($loop) --}}
    <div>
        <h1><a href="blogs/{{ $blog->slug }}"> 
        {{ $blog->title }} </a>
        </h1>
        <div>
            <p> {{ $blog->intro  }} </p>
            <p>published at: {{ $blog->date }} </p>
        </div>
    </div>
    @endforeach

@endsection