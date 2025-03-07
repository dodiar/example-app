@extends('templates/layout')

@section('title', 'Login Page')

@section('content')
  <div class="container" id="featured-3">
      @if($status = session('status'))
        <div class="alert alert-success" role="alert">
          {{ $status }}
        </div>
      @endif    
      <h1>Login</h1>      
      <form action="/login" method="POST">
        @csrf
        
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="exampleFormControlInput1">
        </div>

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
        </div>

        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-check">
            <input class="form-check-input" name="remember_me" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Remember me
        </div>

        <br>
        
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="/forgot-password" class="btn btn-secondary">Forgot Password</a>
      </form>
  </div>
    
@endsection
