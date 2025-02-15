@extends('templates/main')

@section('content')
    <p>This is about<br>
        Name : {{ $name }} <br>
        Gender : {{ $gender }} <br>
        Date of Birth : {{ $dateOfBirth }} <br>
        Address : {{ $address }}
    </p>
    
@endsection