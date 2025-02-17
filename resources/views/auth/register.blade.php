@extends('templates/layout')

@section('title', 'Register Page')

@section('content')
  <div class="container" id="featured-3">    
      <h1>Register</h1>

      <form action="/register" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
        </div>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

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
        
        <button type="submit" class="btn btn-primary">Register</button>
      </form>
  </div>
    
@endsection
