@extends('layouts.base')

@section('content')
  <form action='{{ route('task.update' , $task -> id)}}' method="post">
    @csrf
    @method('POST')
    <div class="form-group">
      <label for="title">TITLE</label>
      <input type="text" class="form-control" name="title" value="{{ $task -> title}}">
    </div>
    <div class="form-group">
    <label for="description">DESCRIPTION</label>
    <input type="text" class="form-control" name="description" value="{{ $task -> description}}">
    </div>
    <select multiple class="form-control" name="employees[]">
      @foreach ($employees as $employee)
        <option value="{{ $employee -> id}}"
          @if ($task -> employees() -> find($employee -> id))
              selected
          @endif  
        >{{$employee -> name}} {{$employee -> lastname}}</option>
      @endforeach
    </select>
    <button type="submit" class="btn btn-primary mt-3">UPDATE</button>
  </form>
@endsection