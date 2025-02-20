@extends('templates/layout')

@section('title', 'Page Home')

@section('content')
<div class="container px-4 py-5" id="featured-3">
    <form action="/news" method="GET">
      <input type="text" name="search" class="form-control" placeholder="Search">
    </form>  
    
    <br>

    @role('writer')
      @auth
      <a href="/news/create" class="btn btn-primary">Create</a>
      @endauth
    @endrole
    
    <div class="row g-4 py-1 row-cols-1 row-cols-lg-3">
    @php
      $num = 1;
    @endphp
    @foreach($news as $item)     

      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">          
        </div>
        <img src="{{ asset('storage/' . $item->image_path) }}" alt="" class="img-fluid"> 
        <h3 class="fs-2 text-body-emphasis">{{ $item->title }}</h3>
        <p>{{ $item->body }}</p>
        <a href="/news/{{ $item->id }}" class="icon-link">
          Read More
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>       
      </div>

      @php
        $num++;
      @endphp
      
    @endforeach

    </div>

    {{ $news->links() }}
  </div>
    
@endsection
