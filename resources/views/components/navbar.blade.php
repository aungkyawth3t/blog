 <!-- navbar -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Creative Coder</a>
    <div class="d-flex">
      <a href="/#blogs" class="nav-link">Blogs</a>
      <a href="#subscribe" class="nav-link">Subscribe</a>
      {{-- @auth @else @endauth, @guest @else @endguest --}}
      @if (!auth()->check())
        <a href="/register" class="nav-link">Register</a>
        <a href="/login" class="nav-link">Login</a>
      @else
        <a href="" class="nav-link text-white fw-bold ms-4"> {{ auth()->user()->name }} </a>
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