@extends('templates/layout')

@section('title', 'Create Page')

@section('content')
  <div class="container" id="featured-3">    
      <h1>Detail News</h1>
        <img src="{{ asset('storage/' . $news->image_path) }}" alt="" class="img-fluid"> 
        <h2>{{ $news->title }}</h2>
        <p>{{ $news->body }}</p>

        @auth
        <form action="/news/{{ $news->id }}" method="POST">
            <a href="/news/{{ $news->id }}/edit" class="btn btn-primary">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        @endauth
       
  </div>
    
@endsection
