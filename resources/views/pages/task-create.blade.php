@extends('layouts.base')

@section('content')
  <form action='{{ route('task.store')}}' method="post">
    @csrf
    @method('POST')
    <div class="form-group">
      <label for="title">TITLE</label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
    <label for="description">DESCRIPTION</label>
    <input type="text" class="form-control" name="description">
    </div>
    <div class="form-check form-check-inline">
      @foreach ($employees as $employee)
        <input class="form-check-input" type="checkbox" name="employees[]" value="{{ $employee -> id}}">
        <label class="form-check-label">{{$employee -> name}} {{$employee -> lastname}}</label>
      @endforeach
    </div>
    <button type="submit" class="btn btn-primary mt-3">CREATE</button>
  </form>
@endsection