@extends('templates/layout')

@section('content')
<div class="container px-4 py-5" id="featured-3">    
    <div class="row g-4 py-1 row-cols-1 row-cols-lg-3">

    @for ($i = 0; $i < 9; $i++)

      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">          
        </div>
        <h3 class="fs-2 text-body-emphasis">Judul Berita {{ $i + 1 }}</h3>
        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        <a href="#" class="icon-link">
          Read
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>       
      </div>
      
    @endfor

    </div>
  </div>
    
@endsection
