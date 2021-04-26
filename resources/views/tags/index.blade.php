@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2 mt-2 mt-md-0">
   <a href="{{ route('tag.create') }}" class="btn btn-primary">Create new tag</a>
</div>

<div class="card">
   <div class="card-header">
      Tags
   </div>
   <div class="card-body">

      @if(count($tags) === 0)
      <h3>No tag in the list yet</h3>
      @else
      <table class="table">
         <thead>
            <th>Name</th>
            <th>Posts</th>
            <th></th>
            <th></th>
         </thead>
         <tbody>
            @foreach($tags as $tag)
            <tr>
               <td>{{ $tag->name }}</td>
               <td> 0 </td>
               <td><a href="{{ route('tag.edit', $tag->id) }}">Edit</a></td>
               <td>
                  <button class="btn btn-danger btn-sm" id="{{ $tag->id }}" name="{{ $tag->name }}" data-toggle="modal"
                     data-target="#deleteModal" onclick="handleDelete()">Delete</button>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
      @endif

   </div>
</div>
@endsection


@section('scripts')
<script>
   function handleDelete() {
      const id = window.event.target.id
      const name = window.event.target.name
      const form = document.getElementById('tagDeleteForm')
      const nameDiv = document.getElementById('tagName')

      nameDiv.innerHTML = name
      form.action = `/tag/${id}`
      $('#deleteModal').modal('show')
   }
</script>
@endsection


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="tagDeleteModal" aria-hidden="true">
   <div class="modal-dialog">
      <form action="" method="POST" id="tagDeleteForm">
         @csrf
         @method('DELETE')

         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <p>Do you really want to delete tag?</p>
               <p class="font-weight-bolder" id="tagName"></p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Go Back</button>
               <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </div>
         </div>
      </form>
   </div>
</div>
