@extends('layouts.app')

@section('contenu')

  <table class="table">
      <thead>
          <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Profile</th>
              <th>Permission</th>
             
          </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
              <td scope="row">{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                 @if($user->admin) 
                   Admin 
                 @else 
                    Author 
                 @endif
              </td>
              <td>
                 <form method="post" action="{{ route('user.change.permission', ['id' => $user->id]) }}">
                 @csrf 
                 @method('PUT')
                 @if($user->admin) 
                   <button class="btn btn-success btn-sm">Demote permission</button>  
                 @else 
                    <button class="btn btn-warning btn-sm">Promote Permission</button> 
                 @endif
                 </form>
             </td>
             
          </tr>
        @endforeach
      </tbody>
  </table>

@stop