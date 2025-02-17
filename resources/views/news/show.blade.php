@extends('templates/layout')

@section('title', 'Create Page')

@section('content')
  <div class="container" id="featured-3">    
      <h1>Detail News</h1>
        <h2>{{ $news->title }}</h2>
        <p>{{ $news->body }}</p>
      </div>
    
@endsection
