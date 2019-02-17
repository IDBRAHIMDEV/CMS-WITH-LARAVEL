@extends('layouts.site')


@section('sidebar')
<h3>Sidebar</h3>
@stop


@section('content')

<div class="row">

   @foreach($posts as $post) 
   
  <div class="col-md-4">
        <div class="card bg-primary mb-3" style="max-width: 20rem;">
            <div class="card-header">{{ $post->title }}</div>
            <div class="card-body">
                <h4 class="card-title">{{ $post->user->name }}</h4>
                <p class="card-text">{{ $post->content }}</p>
            </div>
        </div>
  </div>

   @endforeach
</div>

<div class="row">
    <div class="col-md-6 mx-auto">
        {{ $posts->links() }}
    </div>
</div>

@stop