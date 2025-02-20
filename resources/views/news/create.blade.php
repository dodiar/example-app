@extends('templates/layout')

@section('title', 'Create Page')

@section('content')
  <div class="container" id="featured-3">    
      <h1>Create News</h1>

      <form action="/news" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
        </div>

        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Body</label>
          <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Image</label>
          <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
        </div>
  
          @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        <button type="submit" class="btn btn-primary">Create</button>
      </form>
  </div>
    
@endsection
