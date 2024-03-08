<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("task.update", $task->id) }}" method="POST">
        @method("PUT")
        @csrf
        <input type="text" name="task" id="task" value="{{ $task->task }}">
        <button type="submit">Update Task</button>
    </form>
</body>
</html>