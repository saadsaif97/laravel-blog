@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2 mt-2 mt-md-0">
   <a href="{{ route('post.create') }}" class="btn btn-primary">Create new Post</a>
</div>

<div class="card">
   <div class="card-header">
      Posts
   </div>
   <div class="card-body">

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>{{ session()->get('success') }}</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
      @endif

      <table class="table table-responsive w-100">
         <thead class="w-100">
            <th>Image</th>
            <th>Name</th>
            <th></th>
            <th></th>
         </thead>
         <tbody class="w-100">
            @forelse($posts as $post)
            <tr>
               <td><img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}"
                     style="width: 100px; height: auto;">
               </td>
               <td>{{ $post->title }}</td>

               @if($post->trashed())
               <td>
                  <form action="{{ route('trashed-posts.restore', $post->id) }}" method="POST">
                     @csrf
                     @method('PUT')
                     <button type="submit" class="btn btn-info btn-sm">Restore</button>
                  </form>
               </td>
               @else
               <td><a href="{{ route('post.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a></td>
               @endif

               <td>
                  <button class="btn btn-danger btn-sm" id="{{ $post->id }}" name="{{ $post->title }}"
                     data-toggle="modal" data-target="#deleteModal" onclick="handleDelete()">
                     {{ $post->trashed() ? 'Delete' : 'Trash' }}
                  </button>
               </td>

            </tr>
            @empty
            <td>No post in list</td>
            @endforelse
         </tbody>
      </table>

   </div>
</div>
@endsection


@section('scripts')
<script>
   function handleDelete() {
      const id = window.event.target.id
      const name = window.event.target.name
      const form = document.getElementById('postDeleteForm')
      const nameDiv = document.getElementById('postName')

      nameDiv.innerHTML = name
      form.action = `/post/${id}`
      $('#deleteModal').modal('show')
   }
</script>
@endsection


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="postDeleteModal" aria-hidden="true">
   <div class="modal-dialog">
      <form action="" method="POST" id="postDeleteForm">
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
               <p>Do you really want to delete the post?</p>
               <p class="font-weight-bolder" id="postName"></p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Go Back</button>
               <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </div>
         </div>
      </form>
   </div>
</div>
