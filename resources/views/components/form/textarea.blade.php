@props(['name', 'value' => ''])
<x-form.input-wrapper>
 <x-form.label :name="$name"/>
  <textarea 
    name="{{ $name }}" 
    id="{{ $name }} editor"
    class="form-control"
    cols="30" 
    rows="10"> {{ !!old($name, $value) }} </textarea>
  <x-error :name="$name"/>
</x-form.input-wrapper>