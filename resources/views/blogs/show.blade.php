<x-layout>
<!-- single blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="/storage/{{ $blog->thumbnail }}"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3"> {{ $blog->title }} </h3>
          <div><a href="categories/{{ $blog->category->slug }}"> <span class="badge bg-primary ms-auto"> {{ $blog->category->name }} </span> </a></div>
          <div class="d-flex align-items-center justify-content-between">
            <div>Author - <a href="/users/{{ $blog->author->username }}">{{ $blog->author->name }}</a> </div>
            <div class="text-secondary">{{ $blog->created_at->diffForHumans() }} </div>
            <div class="text-secondary">
              <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
                @csrf
                @auth
                    @if(auth()->user()->isSubscribed($blog))
                      <button type="submit" class="btn btn-danger">Unsubscribe</button>
                    @else
                      <button type="submit" class="btn btn-warning">Subscribe</button>
                    @endif
                @endauth
              </form>
            </div>
          </div>  
          <p class="lh-md mt-3"> {{ $blog->body }} </p>
        </div>
      </div>
    </div>

    <section class="container">
      <div class="col-md-8 mx-auto">
        @if (Auth::check())
          <x-comment-form :blog="$blog"/>
        @else
          <p class="text-center"> Please <a href="/login">login</a> first to comment.</p>
        @endif
      </div>
    </section>

    @if (!empty($blog->comments && count($blog->comments) > 0))
      <x-comments :comments="$blog->comments()->latest()->paginate(3)"/>
    @endif
    <x-blogs_you_may_like :randomBlogs="$randomBlogs"/>
</x-layout>