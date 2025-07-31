<x-layout>
  <h1 class="my-3 text-center">Blog Create </h1>
  <div class="col-md-8 mx-auto">
    <x-card-wrapper>
      <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-form.input name="title"/>
        <x-form.input name="slug"/>
        <x-form.input name="intro"/>
        <x-form.textarea name="body"/>
        <x-form.input name="thumbnail" type="file"/>

        <x-form.input-wrapper>
          <x-form.label name="category"/>
          <select name="category_id" class="form-select">
            <option value="">Choose Category</option>
            @foreach ($categories as $category)
            <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}"> {{ $category->name }} </option>
            @endforeach
          </select>
          <x-error name="category_id"/>
        </x-form.input-wrapper>
        <button type="submit" class="btn btn-info text-white px-4"> Post </button>
      </form>
    </x-card-wrapper>
  </div>
</x-layout>