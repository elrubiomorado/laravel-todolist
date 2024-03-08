@extends("layouts.app")

@section("content")
    <main class="container">

        <div class="card" style="width: 50rem; margin:auto;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Ros%C3%A9_at_a_fan_signing_event_on_September_25%2C_2022_%28cropped%29.jpg/1200px-Ros%C3%A9_at_a_fan_signing_event_on_September_25%2C_2022_%28cropped%29.jpg" class="card-img-top text-center img-fluid img-thumbnail" alt="...">

            <div class="card-body text-center">
              <h5 class="card-title">{{ $task->task }}</h5>
              <p class="card-text">{{ $task->description }}</p>
            </div>
            
            <div class="container d-flex justify-content-center mb-2">
                <a href="{{ route("task.edit", $task->id) }}" class="btn btn-primary btm-sm">Edit</a>
                <form action="{{ route("task.delete", $task->id) }}" method="POST">
                    @method("delete")
                    @csrf
                    
                    <input type="submit" value="Delete" class="btn btn-danger btn-block">
                    </form>
            </div>
            <div class="container d-flex justify-content-center mb-2">
                <a href="{{ route("task.index") }}" class="btn btn-success btm-sm">Back to home</a>
                
            </div>
        </div>
    </main>

@endsection