@extends('layouts.app')

@section('contenu')

  <table class="table">
      <thead>
          <tr>
              <th>name</th>
              <th class="text-right">Edit</th>
              <th class="text-right">Delete</th>
          </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
          <tr>
              <td scope="row">{{ $category->name }}</td>
              <td class="text-right">
                 <a href="{{ route('category.edit', [
                                'id' => $category->id
                             ]) 
                          }}" 
                 class="btn btn-warning btn-sm">
                   <i class="fa fa-pencil"></i> Edit
                 </a>     
              </td>
              <td class="text-right">

                <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="post">
                  @csrf 
                  @method('delete')
                  <button class="btn btn-danger btn-sm">
                     <i class="fa fa-trash"></i> Delete
                  </button>
                </form> 
              </td>
          </tr>
        @endforeach
      </tbody>
  </table>

@stop