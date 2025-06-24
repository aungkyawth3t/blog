<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="app.css">
    <style>
        .bg-yellow {
            background-color: yellow;
        }
    </style>
</head>
<body>
    @foreach ($blogs as $blog)
    {{-- @dd($loop) --}}
    <h1><a href="blogs/{{ $blog->slug }}"> 
        {{ $blog->title }} </a>
    </h1>
    <div>
        <p> {{ $blog->intro  }} </p>
        <p>published at: {{ $blog->date }} </p>
    </div>
    @endforeach
</body>
</html>