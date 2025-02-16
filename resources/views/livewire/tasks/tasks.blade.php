<section class="gradient-custom-2">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-10">
  
          <div class="card mask-custom">
            <div class="card-body p-4 text-white">
  
              <div class="text-center pt-3 pb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-todo-list/check1.webp"
                  alt="Check" width="60">
                <h1 class="my-4">Task List</h1>
              </div>
  
              <table class="table text-white mb-0">
                <thead>
                  <tr>
                    <th scope="col">Task</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Completed</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr class="fw-normal">
                            <td class="align-middle">
                                <span>{{ $task->name }}</span>
                            </td>
                            <td class="align-middle">
                                <span>{{ $task->user_id }}</span>
                            </td>
                            <td class="align-middle">
                                @if ($task->complete)
                                    <h6 class="mb-0"><span>Completed</span></h6>
                                @else
                                    <h6 class="mb-0"><span>Pending</span></h6>
                                @endif
                            </td>
                            <td class="d-flex gap-15">
                                <form action="{{ route('task.update', $task->id) }}" class="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="done" value="{{ $task->complete ? 0 : 1 }}">
                                    @if ($task->complete)
                                        <button type="submit" class="btn btn-info btn-xs">InComplete</button>
                                    @else
                                        <button type="submit" class="btn btn-success btn-xs">Complete</button>
                                    @endif
                                </form>
                                <form action="{{ route('task.delete', $task->id) }}" class="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
  
  
            </div>
          </div>
  
        </div>
      </div>
    </div>
</section>

<script>
  console.log("Echo Object: ", window.Echo);
  window.Echo.channel('tasks')
      .listen('.task.updated', (e) => {
          console.log('Task updated:', e);
          alert('Task Updated: ' + e.task.name);
      });
</script>
