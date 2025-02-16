@extends('layouts.main')
@section('content')
    

    <style>
        .gradient-custom-2 {
  /* fallback for old browsers */
  /* background: #7e40f6; */

  /* Chrome 10-25, Safari 5.1-6 */
  /*  */
}

.mask-custom {
  background: rgba(24, 24, 16, 0.2);
  border-radius: 2em;
  backdrop-filter: blur(25px);
  border: 2px solid rgba(255, 255, 255, 0.05);
  background-clip: padding-box;
  box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
}

* {
    color: #000;
}

body {
            background-color: #f8f9fa;
        }
        .task-form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            width: 100%;
            border-radius: 5px;
        }

.gap-15 {
    gap: 15px;
}

@media(max-width: 768px) {
    .d-flex {
        flex-direction: column;
    }
}
    </style>
    
    <div class="container">
        <div class="task-form-container">
            <h2 class="text-center">Create a New Task</h2>
            
            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                
                <!-- Task Title -->
                <div class="mb-3">
                    <label for="name" class="form-label">Task Title</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter task title">
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Create Task</button>
            </form>
        </div>
    </div>
@endsection