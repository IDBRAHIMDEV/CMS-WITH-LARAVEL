@extends('layouts.app')

@section('contenu')

  <h3>List of posts</h3>
  
  <table class="table">
      <thead>
          <tr>
              <th>Title</th>
              <th>Category</th>
              <th class="text-right">Edit</th>
              <th class="text-right">Restore</th>
          </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
          <tr>
              <td scope="row">{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td class="text-right">
                 <a href="{{ route('post.edit', ['id' => $post->id]) }}" 
                 class="btn btn-warning btn-sm">
                   <i class="fa fa-pencil"></i> Edit
                 </a>     
              </td>
              <td class="text-right">

                <form action="{{ route('post.restore', ['id' => $post->id]) }}" method="post">
                  @csrf 
               
                  <button class="btn btn-success btn-sm">
                     <i class="fa fa-trash"></i> Restore
                  </button>
                </form> 
              </td>
          </tr>
        @endforeach
      </tbody>
  </table>

@stop