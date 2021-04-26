@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">
      {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
   </div>

   <div class="card-body">

      <form action="{{ isset($tag) ? route('tag.update', $tag->id) : route('tag.store') }}" method="POST">
         @csrf

         @if(isset($tag))
         @method('PATCH')
         @endif

         <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name',$tag->name ?? '') }}">
            <p class="text-danger">@error('name') {{ $message }} @enderror</p>
         </div>
         <div class="form-group">
            <input type="submit" value="{{ isset($tag) ? 'Update Tag' : 'Create Tag' }}"
               class="btn {{ isset($tag) ? 'btn-info' : 'btn-success' }}">
         </div>
      </form>
   </div>

</div>
@endsection
