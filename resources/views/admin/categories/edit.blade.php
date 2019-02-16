@extends('layouts.app')

@section('contenu')
    
    <h2>Edit category: {{ $category->name }}</h2>

    @if($errors->any())
    <div class="alert alert-warning">
      <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach 
      </ul>
    </div>
    @endif

    <form action="{{ route('category.update', ['id' => $category->id ]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input value="{{ $category->name }}" id="name" name="name" type="text" class="form-control input-lg" placeholder="Create new category">
        </div>
        <button class="btn btn-block btn-warning">
            <i class="fa fa-refresh"></i> Update
        </button>   
    </form>

@endsection