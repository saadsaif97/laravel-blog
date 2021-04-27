@extends('layouts.app')

@section('content')

<div class="card">
   <div class="card-header">
      Users
   </div>
   <div class="card-body">

      @if(count($users) === 0)
      <h3>No user in the list yet</h3>
      @else
      <table class="table">
         <thead>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th></th>
         </thead>
         <tbody>
            @foreach($users as $user)
            <tr>
               <td></td>
               <td>{{ $user->name }}</td>
               <td>{{ $user->email }}</td>
               <td>
                  @if(!$user->isAdmin())
                  <form action="{{ route('user.update', $user->id ) }}" method="post">
                     @csrf
                     @method('put')
                     <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                  </form>
                  @endif
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
      const form = document.getElementById('userDeleteForm')
      const nameDiv = document.getElementById('userName')

      nameDiv.innerHTML = name
      form.action = `/user/${id}`
      $('#deleteModal').modal('show')
   }
</script>
@endsection


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="userDeleteModal" aria-hidden="true">
   <div class="modal-dialog">
      <form action="" method="POST" id="userDeleteForm">
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
               <p>Do you really want to delete user?</p>
               <p class="font-weight-bolder" id="userName"></p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Go Back</button>
               <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </div>
         </div>
      </form>
   </div>
</div>
