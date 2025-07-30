<x-layout>
  <h1 class="my-3 text-center">Blog Create </h1>
  <div class="col-md-8 mx-auto">
    <x-card-wrapper>
      <form action="{{ route('blogs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label 
            for="title"
            class="form-label"> Title </label>
          <input
            required
            type="text"
            id="title"
            class="form-control"
            name="title"
            value="{{ old('title') }}">
          <x-error name="title"/>
        </div>

        <div class="mb-3">
          <label 
            for="slug"
            class="form-label"> Slug </label>
          <input
            required
            type="text"
            id="slug"
            class="form-control"
            name="slug"
            value="{{ old('slug') }}">
          <x-error name="slug"/>
        </div>

        <div class="mb-3">
          <label 
            for="category_id"
            class="form-label"> Category </label>
            <select name="category_id" class="form-select">
              <option value="">Choose Category</option>
              @foreach ($categories as $category)
              <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}"> {{ $category->name }} </option>
              @endforeach
            </select>
          <x-error name="category"/>
        </div>

        <div class="mb-3">
          <label 
            for="intro"
            class="form-label"> Intro </label>
          <input
            required
            type="text"
            id="intro"
            class="form-control"
            name="intro"
            value="{{ old('intro') }}">
          <x-error name="intro"/>
        </div>

        <div class="mb-3">
          <label 
            for="body"
            class="form-label"> Body </label>
          <textarea 
            name="body" 
            id="body"
            class="form-control"
            cols="30" 
            rows="10"> {{ old('body') }} </textarea>
          <x-error name="body"/>
        </div>
        <button type="submit" class="btn btn-info text-white px-4"> Post </button>
      </form>
    </x-card-wrapper>
  </div>
</x-layout>