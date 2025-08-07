 <!-- navbar -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}"> Knowayy</a>
    <div class="d-flex">
      <a href="/#blogs" class="nav-link">Blogs</a>
      <a href="#subscribe" class="nav-link">Subscribe</a>
      {{-- @auth @else @endauth, @guest @else @endguest --}}
      @if (!auth()->check())
        <a href="/register" class="nav-link">Register</a>
        <a href="/login" class="nav-link">Login</a>
      @else
       @if (auth()->user()->can('admin'))
         <a href="/admin/blogs" class="nav-link"> Dashboard </a>
       @endif
        <img src="{{ auth()->user()->avator }}" width="40" height="40" class="rounded-circle me-0" alt="">
        <a href="" class="nav-link text-white fw-bold"> {{ auth()->user()->name }} </a>
      @endif

      @if (auth()->check())
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="nav-link text-white btn btn-primary btn-sm">Logout</button>
        </form>
      @endif
    </div>
  </div>
</nav>