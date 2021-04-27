@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">
      Edit Profile
   </div>

   <div class="card-body">

      <form action="{{ route('user.update', $user->id) }}" method="POST">
         @csrf
         @method('put')


         <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name',$user->name) }}">
            <p class="text-danger">@error('name') {{ $message }} @enderror</p>
         </div>
         <div class="form-group">
            <label for="bio">Bio:</label>
            <input id="bio" type="hidden" name="bio" value="{{ old('bio',$user->bio) }}">
            <trix-editor input="bio"></trix-editor>
            <p class="text-danger">@error('bio') {{ $message }} @enderror</p>
         </div>
         <div class="form-group">
            <input type="submit" value="Update User" class="btn btn-info">
         </div>
      </form>
   </div>

</div>
@endsection


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"
   integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA=="
   crossorigin="anonymous" />
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"
   integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg=="
   crossorigin="anonymous"></script>
@endsection
