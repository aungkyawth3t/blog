<x-layout>
    {{-- @dd($blog); --}}
    <x-slot name="title">
        <title> {{ $blog->title }} </title>
    </x-slot>
    <article>
        <h1>{{ $blog->title }}</h1>
        <p> {!! $blog->body !!} </p>
        <a href="/">go back</a>
    </article>
</x-layout>
