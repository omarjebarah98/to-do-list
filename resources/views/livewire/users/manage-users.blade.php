@if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    
<section class="gradient-custom-2">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-10">
  
          <div class="card mask-custom">
            <div class="card-body p-4 text-white">
  
              <div class="text-center pt-3 pb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-todo-list/check1.webp"
                  alt="Check" width="60">
                <h1 class="my-4">Users List</h1>
              </div>
  
              <table class="table text-white mb-0">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if (Auth::id() !== $user->id)
                            <tr class="fw-normal">
                                <td class="align-middle">
                                    <span>{{ $user->name }}</span>
                                </td>
                                <td class="align-middle">
                                    <span>{{ $user->email }}</span>
                                </td>
                                <td class="align-middle">
                                    <span>{{ $user->role }}</span>
                                </td>
                                <td class="d-flex gap-15">
                                    <button wire:click="changeRole({{ $user->id }}, 'admin')" class="btn btn-warning">Make Admin</button>
                                    <button wire:click="changeRole({{ $user->id }}, 'user')" class="btn btn-info">Make User</button>
                                    <button wire:click="deleteUser({{ $user->id }})" class="btn btn-danger">Delete</button>
                                    <button wire:click="showUserTasks({{ $user->id }})" class="btn btn-primary">View Tasks</button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
              </table>
  
            @if ($selectedUser)
                <div>
                    <h3>Tasks for {{ $selectedUser->name }}</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($selectedUser->tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->complete ? 'Completed' : 'Pending' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
  
            </div>
          </div>
  
        </div>
      </div>
    </div>
</section>