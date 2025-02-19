@extends('templates/layout')

@section('title', 'Login Page')

@section('content')
  <div class="container" id="featured-3">    
      <h1>Reset Password</h1>

      <form action="/reset-password" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        
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

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password Confirmation</label>
          <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput1">
        </div>

        @error('password_confirmation')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
        <button type="submit" class="btn btn-primary">Forgot Password</button>
        
      </form>
  </div>
    
@endsection
