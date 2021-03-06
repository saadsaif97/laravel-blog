@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2 mt-2 mt-md-0">
   <a href="{{ route('category.create') }}" class="btn btn-primary">Create new Category</a>
</div>

<div class="card">
   <div class="card-header">
      Categories
   </div>
   <div class="card-body">

      @if(count($categories) === 0)
      <h3>No category in the list yet</h3>
      @else
      <table class="table">
         <thead>
            <th>Name</th>
            <th>Posts</th>
            <th></th>
            <th></th>
         </thead>
         <tbody>
            @foreach($categories as $category)
            <tr>
               <td>{{ $category->name }}</td>
               <td>{{ $category->posts->count() }}</td>
               <td><a href="{{ route('category.edit', $category->id) }}">Edit</a></td>
               <td>
                  <button class="btn btn-danger btn-sm" id="{{ $category->id }}" name="{{ $category->name }}"
                     data-toggle="modal" data-target="#deleteModal" onclick="handleDelete()">Delete</button>
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
      const form = document.getElementById('categoryDeleteForm')
      const nameDiv = document.getElementById('categoryName')

      nameDiv.innerHTML = name
      form.action = `/category/${id}`
      $('#deleteModal').modal('show')
   }
</script>
@endsection


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="categoryDeleteModal" aria-hidden="true">
   <div class="modal-dialog">
      <form action="" method="POST" id="categoryDeleteForm">
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
               <p>Do you really want to delete category?</p>
               <p class="font-weight-bolder" id="categoryName"></p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Go Back</button>
               <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </div>
         </div>
      </form>
   </div>
</div>
