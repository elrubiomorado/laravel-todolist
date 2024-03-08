@extends('layouts.app')

@section('content')
    <main class="container">  
        <form action="{{ route("task.update", $task->id) }}" method="POST">
            @method("PUT")
            @csrf
            <input type="text" name="task" id="task" value="{{ $task->task }}">
            <input type="text" name="description" id="description" value="{{ $task->description }}">
            <button type="submit">Update Task</button>
        </form>
    </main>
@endsection
