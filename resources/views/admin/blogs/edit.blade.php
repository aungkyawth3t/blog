<x-admin-layout>
  <h1 class="my-3 text-center">Blog Edit </h1>
  <div class="col-md-8 mx-auto">
    <x-card-wrapper>
      <form action="/admin/blogs/{{ $blog->slug }}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-form.input name="title" value="{{ $blog->title }}"/>
        <x-form.input name="slug" value="{{ $blog->slug }}"/>
        <x-form.input name="intro" value="{{ $blog->intro }}"/>
        <x-form.textarea name="body" vlaue="{{ $blog->body }}"/>
        <x-form.input name="thumbnail" type="file"/>
        <img src="/storage/{{ $blog->thumbnail }}" alt="" width="200px" height="100px">

        <x-form.input-wrapper>
          <x-form.label name="category"/>
          <select name="category_id" class="form-select">
            <option value="">Choose Category</option>
            @foreach ($categories as $category)
            <option {{ $category->id == old('category_id', $blog->category->id) ? 'selected' : '' }} value="{{ $category->id }}"> {{ $category->name }} </option>
            @endforeach
          </select>
          <x-error name="category_id"/>
        </x-form.input-wrapper>
        <button type="submit" class="btn btn-info text-white px-4"> Update </button>
      </form>
    </x-card-wrapper>
  </div>
</x-admin-layout>