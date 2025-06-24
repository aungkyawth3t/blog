<x-layout>
    <x-slot name="title">
        <title>Blogs</title>
    </x-slot>
        @foreach ($blogs as $blog)
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
</x-layout>