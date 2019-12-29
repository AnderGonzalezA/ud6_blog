@extends('layouts.app')

@section('content')
  <h1>Creating a post</h1>
  <form enctype="multipart/form-data" action="{{route('posts.store')}}" method="post">
    @csrf
    <div class="form-group" >
        <label>Title</label>
        <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" placeholder="Enter title">
        {!! $errors->first('title','<span class="invalid-feedback ">:message</span>') !!}
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="excerpt" class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : ''}}" placeholder="Enter Excerpt"></textarea>
        {!! $errors->first('excerpt','<span class="invalid-feedback ">:message</span>') !!}
    </div>
    <div class="form-group">
        <label class="control-label" for="inputError">Body</label>
        <textarea rows="5" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}" placeholder="Enter Body"></textarea>
        {!! $errors->first('body','<span class="invalid-feedback ">:message</span>') !!}
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control {{ $errors->has('category') ? 'is-invalid' : ''}}">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        {!! $errors->first('category','<span class="invalid-feedback ">:message</span>') !!}
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="img" class="form-control {{ $errors->has('img') ? ' is-invalid' : '' }}">
        {!! $errors->first('img','<span class="invalid-feedback "><strong>:message</strong></span>') !!}
    </div>

    <button type="submit" class="btn btn-secondary">Create</button>
  </form>
@endsection
