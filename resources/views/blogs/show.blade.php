<x-layout>
<!-- single blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3"> {{ $blog->title }} </h3>
          <div><a href="categories/{{ $blog->category->slug }}"> <span class="badge bg-primary ms-auto"> {{ $blog->category->name }} </span> </a></div>
          <div class="d-flex align-items-center justify-content-between">
            <div>Author - <a href="/users/{{ $blog->author->username }}">{{ $blog->author->name }}</a> </div>
            <div class="text-secondary">{{ $blog->created_at->diffForHumans() }} </div>
          </div>
          <p class="lh-md mt-3"> {{ $blog->body }} </p>
        </div>
      </div>
    </div>

    <section class="container">
      <div class="col-md-8 mx-auto">
        @if (Auth::check())
          <x-card-wrapper>
            <form  action="{{ route('blogs.comments.store', $blog->slug) }}" method="POST">
              @csrf
              <div class="mb-3">
                <textarea name="body" id="" cols="10" rows="5" placeholder="Comment..." class="form-control border-0 @error('body') is-invalid @enderror"></textarea>
                @error('body')
                  <div class="text-danger"> {{ $message }} </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary float-end">Comment</button>
            </form>
          </x-card-wrapper>
        @else
          <p class="text-center"> Please <a href="/login">login</a> first to comment.</p>
        @endif
      </div>
    </section>

    <x-comments :comments="$blog->comments"/>
    <x-subscribe/>
    <x-blogs_you_may_like :randomBlogs="$randomBlogs"/>
</x-layout>