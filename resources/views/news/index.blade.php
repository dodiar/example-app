@extends('templates/layout')

@section('title', 'Page Home')

@section('content')
<div class="container px-4 py-5" id="featured-3">    
    <div class="row g-4 py-1 row-cols-1 row-cols-lg-3">
    @php
      $num = 1;
    @endphp
    @foreach($news as $item)     

      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">          
        </div>
        <h3 class="fs-2 text-body-emphasis">{{ $item->title }}</h3>
        <p>{{ $item->body }}</p>
        <a href="#" class="icon-link">
          Read
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>       
      </div>

      @php
        $num++;
      @endphp
      
    @endforeach

    </div>
  </div>
    
@endsection
