@extends('templates/layout')

@section('title', 'Create Page')

@section('content')
  <div class="container" id="featured-3">    
      <h1>Detail News</h1>
        <h2>{{ $news->title }}</h2>
        <p>{{ $news->body }}</p>

        <a href="/news/{{ $news->id }}/edit" class="btn btn-primary">Edit</a>
      </div>
    
@endsection
