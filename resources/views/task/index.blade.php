@extends("layouts.app")


@section("content")

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
                <div class="mb-3">
                    <label for="description" class="form-label" name="description">Description</label>
                    <div class="input-group">
                        <input type="text" id="description" name="description" class="form-control" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Add Task</button>
            </form>

            <hr class="hr hr-blurry" />
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task Name</th>
                    <th scope="col">Action</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Due Date</th>
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
                            <td class="align-middle"><a href="{{ route("task.show", $task->id) }}" class="text-decoration-none">{{ $task->task }}</a></td>
                            <td>
                                <a href="{{ route("task.edit", $task->id) }}" class="btn btn-primary btm-sm">Edit</a>
                                <form action="{{ route("task.delete", $task->id) }}" method="POST">
                                @method("delete")
                                @csrf
                                
                                <input type="submit" value="Delete" class="btn btn-danger btn-block">
                                </form>
                            </td>
                  
                            <td class="align-middle">
                                <p>{{ $task->created_at }}</p>
                            </td>
                            <td class="align-middle">

                                {{-- TODO - Due Date --}}
                                <p>Due date</p>
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
@endsection
  


