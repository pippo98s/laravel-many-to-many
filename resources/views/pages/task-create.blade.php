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
    <select multiple class="form-control" name="employees[]">
      @foreach ($employees as $employee)
        <option value="{{ $employee -> id}}">{{$employee -> name}} {{$employee -> lastname}}</option>
      @endforeach
    </select>
    <button type="submit" class="btn btn-primary mt-3">CREATE</button>
  </form>
@endsection