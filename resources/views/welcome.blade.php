@extends('layouts.app')
@section('content')
  @foreach ($posts as $post)
  <div class="row">
    <!-- Post Content Column -->
    <div class="col-lg-8">
      <!-- Title -->
      <h1 class="mt-4">{{$post->title}}</h1>
      <!-- Author -->
      <p class="lead">
        by
        <a href="#">{{$post->user->name}}</a>
      </p>
      <hr>
      <!-- Date/Time -->
      <p>{{$post->published_at}}</p>
      <hr>
      <!-- Preview Image -->
      <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
      <hr>
      <!-- Post Content -->
      <p class="lead">{{$post->excerpt}}</p>
      <p>{{$post->body}}</p>
      <hr>
    </div>
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">{{$post->category->name}}</a>
                  </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- /.row -->
  @endforeach
@endsection
