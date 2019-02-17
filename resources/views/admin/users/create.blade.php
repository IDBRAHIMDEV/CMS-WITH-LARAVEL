@extends('layouts.app')

@section('contenu')
    
    <h2>Create a user</h2>

    @if($errors->any())
    <div class="alert alert-warning">
      <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach 
      </ul>
    </div>
    @endif

    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" class="form-control input-lg" placeholder="Create new Name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" type="text" class="form-control input-lg" placeholder="Create new email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" class="form-control input-lg" placeholder="Create password">
        </div>

        <button class="btn btn-block btn-primary">
            <i class="fa fa-plus"></i> Submit
        </button>   
    </form>

@endsection