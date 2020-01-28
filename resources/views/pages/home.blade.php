@extends('layouts.base')

@section('content')

  <div class="row">
    <div class="col-12">
        <h1>Tasks</h1>
    </div>
    <div class="col-12 text-right">
        <a class="btn-primary btn right create" href="">Aggiungi Nuovo</a>
    </div>
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Employees</th>
                    <th>Aggiorna</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        <table>
                            <tbody>
                                @foreach ($task -> employees as $employee)
                                  <td>{{$employee -> name}} {{$employee -> lastname}}</td>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <a class="btn btn-success" href="">Aggiorna</a>
                    </td>
                    <td>
                        <form action="" method="post">
                            @method('delete')
                            @csrf
                            <input class="btn btn-danger" value="Elimina" type="submit">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-12">
        {{ $tasks->links() }}
    </div>
</div>
@endsection