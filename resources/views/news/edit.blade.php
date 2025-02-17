@extends('templates/layout')

@section('title', 'Edit Page')

@section('content')
  <div class="container" id="featured-3">    
      <h1>Edit News</h1>

      <form action="/news/{{ $news->id }}" method="POST">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ $news->id }}">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $news->title }}">
        </div>

        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Body</label>
          <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $news->body }}</textarea>
        </div>

        @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
    
@endsection
