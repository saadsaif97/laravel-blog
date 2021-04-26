@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">
      {{ isset($post) ? 'Edit Post' : 'Create Post' }}
   </div>

   <div class="card-body">

      <form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}" method="POST"
         enctype="multipart/form-data">
         @csrf

         @if(isset($post))
         @method('PATCH')
         @endif

         <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control"
               value="{{ old('title',$post->title ?? '') }}">
            <p class="text-danger">@error('title') {{ $message }} @enderror</p>
         </div>
         <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" class="form-control"
               value="{{ old('description',$post->description ?? '') }}">
            <p class="text-danger">@error('description') {{ $message }} @enderror</p>
         </div>
         <div class="form-group">
            <label for="content">Content:</label>
            <input id="content" type="hidden" name="content" value="{{ old('content',$post->content ?? '') }}">
            <trix-editor input="content"></trix-editor>
            <p class="text-danger">@error('content') {{ $message }} @enderror</p>
         </div>
         @if(isset($post))
         <div class="form-group">
            <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" width="100%">
         </div>
         @endif
         <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" class="form-control-file"
               value="{{ old('image',$post->image ?? '') }}">
            <p class="text-danger">@error('image') {{ $message }} @enderror</p>
         </div>
         <div class="form-group">
            <label for="published_at">Publish Date:</label>
            <input type="text" name="published_at" id="published_at" class="form-control"
               value="{{ old('published_at',$post->published_at ?? '') }}">
            <p class="text-danger">@error('published_at') {{ $message }} @enderror</p>
         </div>
         <div class="form-group">
            <input type="submit" value="{{ isset($post) ? 'Update' : 'Create' }} post"
               class="btn {{ isset($post) ? 'btn-info' : 'btn-success' }}">
         </div>
      </form>
   </div>

</div>
@endsection


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"
   integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA=="
   crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"
   integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg=="
   crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
   const published_at = document.getElementById("published_at");
   const fp = flatpickr(published_at, { enableTime: true });  // flatpickr
</script>
@endsection
