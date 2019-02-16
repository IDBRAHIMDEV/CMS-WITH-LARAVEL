@extends('layouts.app')

@section('contenu')
    
    <h2>Create a category</h2>

    @if($errors->any())
    <div class="alert alert-warning">
      <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach 
      </ul>
    </div>
    @endif

    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" class="form-control input-lg" placeholder="Create new category">
        </div>
        <button class="btn btn-block btn-primary">
            <i class="fa fa-plus"></i> Submit
        </button>   
    </form>

@endsection