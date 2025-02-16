<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AddTask extends Component
{
    public $tasks;
    public $name;
    public $status;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];
    
    public function createTask() {
        $this->validate();

        Cache::forget('task_list_user_' . Auth::id());

        Task::create([
            'name' => $this->name,
            'user_id' => Auth::id(),
        ]);
        $this->name = '';
        $this->emit('taskAdded'); 
        session()->flash('success', 'Task created successfully!');
    }

    public function render()
    {
        return view('livewire.tasks.add-task');
    }
}
