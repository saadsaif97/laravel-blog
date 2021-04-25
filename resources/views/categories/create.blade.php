@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">
      {{ isset($category) ? 'Edit Category' : 'Create Category' }}
   </div>

   <div class="card-body">

      <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}"
         method="POST">
         @csrf

         @if(isset($category))
         @method('PATCH')
         @endif

         <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control"
               value="{{ old('name',$category->name ?? '') }}">
            <p class="text-danger">@error('name') {{ $message }} @enderror</p>
         </div>
         <div class="form-group">
            <input type="submit" value="{{ isset($category) ? 'Update' : 'Create' }} Category"
               class="btn {{ isset($category) ? 'btn-info' : 'btn-success' }}">
         </div>
      </form>
   </div>

</div>
@endsection
