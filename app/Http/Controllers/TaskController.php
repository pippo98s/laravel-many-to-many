<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Employee;

class TaskController extends Controller
{
    public function index(){
        
        $tasks = Task::paginate();
        return view('pages.home' , compact('tasks'));
    }

    public function show($id){

        $task = Task::findOrFail($id);
        return view('pages.task-show' , compact('task'));
    }

    public function create(){

        $employees = Employee::all();
        return view('pages.task-create' , compact('employees'));
    }

    public function store(Request $request){

        $data = $request -> all();
        $task = Task::create($data);
        $employees = Employee::find($data['employees']);
        $task -> employees() -> attach($employees);
        return redirect() -> route('home.index');
    }

    public function edit($id) {
        $task = Task::findOrFail($id);
        $employees = Employee::all();
        return view('pages.task-edit', compact('task', 'employees'));
        dd($id);
    }

    public function update(Request $request, $id) {

        $data = $request -> all();
        $task = Task::findOrFail($id);
        $task -> update($data);
        $employees = Employee::find($data['employees']);
        $task -> employees() -> sync($employees);
        return redirect() -> route('home.index');
    }

    public function destroy($id) {

        $task = Task::findOrFail($id);
        $task -> employees() -> detach();
        $task -> delete();
        return redirect() -> route('home.index');
    }
}
