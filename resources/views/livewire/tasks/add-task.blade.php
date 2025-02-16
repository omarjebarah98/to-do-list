
@if(session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="container">
    <div class="task-form-container">
        <h2 class="text-center">Create a New Task</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Task Title</label>
                <input type="text" wire:model="name" class="form-control" required placeholder="Enter task title">
            </div>
            
            <button wire:click.prevent="createTask" class="btn btn-primary">Create Task</button>
    </div>
</div>