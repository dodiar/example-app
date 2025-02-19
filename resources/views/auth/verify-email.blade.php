@extends('templates/layout')

@section('title', 'Login Page')

@section('content')
  <div class="container" id="featured-3">
      @if ($status = session('message'))
      <div class="alert alert-success" role="alert">
        {{ $status }}
      </div>
      @endif
      <h1>Verify Email</h1>
      <form action="/email/verification-notification" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Verify My Email</button>
        
      </form>
  </div>
    
@endsection
