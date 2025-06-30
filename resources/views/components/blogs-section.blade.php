@props(['blogs'])
<section class="container text-center" id="blogs">
  <h1 class="display-5 fw-bold mb-4">Blogs</h1>
  <div class="">
    <select onchange="location=this.value" class="p-1 form-select">
      <option value="">Filter By Category</option>
      @foreach ($blogs as $blog)
        <option value="/categories/{{ $blog->category->slug }}"> {{ $blog->category->name }} </option>
      @endforeach
    </select>
    {{-- <select name="" id="" class="p-1 rounded-pill mx-3">
      <option value="">Filter by Tag</option>
    </select> --}}
  </div>
  <form action="" class="my-3">
    <div class="input-group mb-3">
      <input
        type="text"
        autocomplete="false"
        class="form-control"
        placeholder="Search Blogs..."
      />
      <button
        class="input-group-text bg-primary text-light"
        id="basic-addon2"
        type="submit"
      >
        Search
      </button>
    </div>
  </form>
  <div class="row">
    @foreach ($blogs as $blog)
      <div class="col-md-4 mb-4">
        <x-card :blog="$blog"/>
      </div>
    @endforeach
  </div>
</section>