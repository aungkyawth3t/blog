<x-layout>
    @if (session()->get('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <x-hero/>
    <x-blogs-section :blogs="$blogs"/>
</x-layout>