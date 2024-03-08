<!doctype html>
<html lang="en">
    <head>
        <title>Todo List App</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>
            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            main {
                flex: 1;
            }
        </style>
    </head>

    <body>
        <header class="text-center mt-3 mb-4">
            <h1 class="display-4">Todo List App</h1>
        </header>
        <main class="container">  
            <form action="{{ route("task.store") }}" method="POST" class="my-4">
                @method("POST")
                @csrf
            
                <div class="mb-3">
                    <label for="task" class="form-label" name="task">Task Name</label>
                    <div class="input-group">
                        <input type="text" id="task" name="task" class="form-control" />
                    </div>
                </div>
            
                <button type="submit" class="btn btn-primary btn-block">Add Task</button>
            </form>
            
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task Name</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1; //Counter for the table row    
                    @endphp
                    @foreach ($tasks as $task)
                        <tr class="bg-primary">
                            <th scope="row" class="align-middle">{{ $counter++ }}</th>
                            <td class="align-middle">{{ $task->task }}</td>
                            <td>
                                <form action="{{ route("task.delete", $task->id) }}" method="POST">
                                @method("delete")
                                @csrf
                                
                                <input type="submit" value="Delete" class="btn btn-danger btn-block">
                                </form>
                                <a href="{{ route("task.edit", $task->id) }}" class="btn btn-primary btm-sm">Edit</a>
                            </td>
                            <td class="align-middle">
                                @if ($task->status == 0)
                                    <form action="{{ route("task.update", $task->id) }}" method="POST">
                                        @method("PUT")
                                        @csrf
                                        <input type="hidden" name="status" value="1">
                                        <input type="submit" value="Mark as Done" class="btn btn-success">
                                    </form>
                                @else
                                    <form action="{{ route("task.update", $task->id) }}" method="POST">
                                        @method("PUT")
                                        @csrf
                                        <input type="hidden" name="status" value="0">
                                        <input type="submit" value="Mark as Undone" class="btn btn-warning">
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
        <footer class="bg-body-tertiary text-center">

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2024 Copyright:
                <a class="text-body" href="https://github.com/elrubiomorado" target="_blank">elrubiomorado</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>



