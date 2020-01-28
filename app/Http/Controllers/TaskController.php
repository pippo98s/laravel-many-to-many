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
}
