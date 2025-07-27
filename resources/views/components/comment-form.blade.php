@props(['blog'])
<x-card-wrapper>
  <form  action="{{ route('blogs.comments.store', $blog->slug) }}" method="POST">
    @csrf
    <div class="mb-3">
      <textarea name="body" id="" cols="10" rows="5" placeholder="Comment..." class="form-control border-0 @error('body') is-invalid @enderror"></textarea>
      <x-error name="body"/>
    </div>
    <button type="submit" class="btn btn-primary float-end">Comment</button>
  </form>
</x-card-wrapper>