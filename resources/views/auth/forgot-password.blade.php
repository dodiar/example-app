@extends('templates/layout')

@section('title', 'Login Page')

@section('content')
  <div class="container" id="featured-3">
      @if($status = session('status'))
      <div class="alert alert-success" role="alert">
        {{ $status }}
      </div>
      @endif
      <h1>Forgot Password</h1>
      <form action="/forgot-password" method="POST">
        @csrf
        
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="exampleFormControlInput1">
        </div>

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
        <button type="submit" class="btn btn-primary">Forgot Password</button>
        
      </form>
  </div>
    
@endsection
