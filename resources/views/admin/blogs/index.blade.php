<x-admin-layout>
  <h3 class="mb-3 text-center">Blogs</h3>
  @if (session()->get('success'))
      <div class="alert alert-success text-center">
          {{ session('success') }}
      </div>
  @endif
  <x-card-wrapper>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Intro</th>
          <th scope="col" colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($blogs as $blog)
          <tr>
            <td>
              <a href="/blogs/{{ $blog->slug }}" target="_blank"> {{ $blog->title }} </a>
            </td>
            <td> {{ $blog->intro }} </td>
            <td> <a href="/admin/blogs/{{ $blog->slug }}/edit" class="btn btn-warning rounded-3"> <i class="bi bi-pencil-square fs-4"></i> </a> </td>
            <td>
              <form action="{{ route('admin.blog.delete', $blog->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger rounded-3" onclick="return confirm('Are you sure you want to delete this blog?')"> <i class="bi bi-trash3 fs-4"></i> </button>
              </form>
            </td>
          </tr>
      @endforeach
      </tbody>
    </table>
    {{ $blogs->links() }}
  </x-card-wrapper>
</x-admin-layout>