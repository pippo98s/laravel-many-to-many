@extends('layouts.base')

@section('content')
  <h1>Title: {{$task -> title}}</h1>
  <h5> <b> Description: </b> {{$task -> description}}</h5>
  <h2>{{$task -> employees -> count()}}
      @if ($task -> employees -> count() < 2)
        Employee
        @else
          Employees:
      @endif   
  </h2>
  @foreach ($task -> employees as $employee)
    <h5>{{$employee -> name}} {{ $employee -> lastname}} </h5>
  @endforeach
  <a class="btn btn-info mt-2" href="{{ route('home.index')}}">Home</a>
@endsection