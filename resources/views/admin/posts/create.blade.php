@extends('layouts.app')

@section('contenu')
    
    <h2>Create a post</h2>

    @if($errors->any())
    <div class="alert alert-warning">
      <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach 
      </ul>
    </div>
    @endif

    <form action="{{ url('admin/post') }}" method="post">
        @csrf
         
         <div class="form-group">
            <label for="category">Select a category</label>
            <select name="category_id" id="category" class="form-control">
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
         </div>
         
         @foreach($tags as $tag)
         <div class="form-check">
           <label class="form-check-label">
             <input type="checkbox" class="form-check-input" name="tags[]" value="{{ $tag->id }}" >
             {{ $tag->name }}
           </label>
         </div>
        @endforeach

        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" name="title" type="text" class="form-control input-lg" placeholder="Create new category">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="4"></textarea>
        </div>

        <button class="btn btn-block btn-primary">
            <i class="fa fa-plus"></i> Submit
        </button>   
    </form>

@endsection