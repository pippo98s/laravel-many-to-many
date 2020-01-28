<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index(){
        
        $tasks = Task::paginate();
        return view('pages.home' , compact('tasks'));
    }
}
