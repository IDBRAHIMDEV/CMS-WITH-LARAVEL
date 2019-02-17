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
                 @if($user->admin) 
                   <a href="" class="btn btn-success btn-sm">Demote permission</a>  
                 @else 
                    <a href="" class="btn btn-warning btn-sm">Promote Permission</a> 
                 @endif
             </td>
             
          </tr>
        @endforeach
      </tbody>
  </table>

@stop