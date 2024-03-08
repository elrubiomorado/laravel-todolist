<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $tasks = task::all();

        return view("task.index", compact("tasks"));
    }

    public function store(Request $request)
    {
        task::create([
            "task" => $request->task,
            "description" => $request->description,
        ]);

        return redirect(route("task.index"));
    }

    //Show note
    public function show(task $task )
    {

        return view("task.show", compact("task"));
    }


    public function edit(task $task)
    {
        return view("task.edit", compact("task"));
    }

    public function update(Request $request, task $task)
    {
        $task->update($request->all());

        return redirect()->route("task.index");
    }

    public function delete(task $task)
    {
        $task->delete();

        return redirect()->route("task.index");
    }
    
}
