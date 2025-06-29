<x-layout>
    <x-slot name="title">
        <title>Blogs</title>
    </x-slot>
        @foreach ($blogs as $blog)
            <div>
                <h1>
                    <a href="blogs/{{ $blog->slug }}"> {{ $blog->title }} </a>
                </h1>
                <h4>
                    <a href="/users/{{ $blog->author->id }}"> Aurthor - {{ $blog->author->name }} </a>
                </h4>
                <a href="categories/{{ $blog->category->slug }}"> {{ $blog->category->name }} </a>
                <div>
                    <p> {{ $blog->intro  }} </p>
                    <p>published at: {{ $blog->created_at->diffForHumans() }} </p>
                </div>
            </div>
        @endforeach
</x-layout>