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
               <td><img src="{{ Gravatar::src('$user->email') }}"
                     style="width: 36px; height: 36px; border-radius: 50%;"></td>
               <td>{{ $user->name }}</td>
               <td>{{ $user->email }}</td>
               <td>
                  @if(!$user->isAdmin())
                  <form action="{{ route('user.make_admin', $user->id ) }}" method="post">
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
