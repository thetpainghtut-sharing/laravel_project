@extends('backend.layout')

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Book Detail</h1>
    <h2>{{ $book->name }}</h2>
    <p>{{ $book->author }}</p>
    <p>{{ $book->description }}</p>
    <img src="{{asset($book->image)}}" alt="Book Image" class="img-fluid">
  </div>
@endsection