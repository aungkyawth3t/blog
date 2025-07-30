<x-layout>
  <h1 class="my-3 text-center">Blog Create </h1>
  <div class="col-md-8 mx-auto">
    <x-card-wrapper>
      <form action="" method="POST">
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