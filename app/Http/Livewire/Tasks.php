<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Tasks extends Component
{
    public $tasks;
    public $name;
    public $status;
    protected $listeners = ['taskAdded' => '$refresh','taskStatusChanged' => '$refresh',];

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount() {
        $this->loadTasks();
    }

    public function loadTasks() {
        $cacheKey = 'task_list_user_' . Auth::id();
        
        $this->tasks = Cache::get($cacheKey);
        
        if (!$this->tasks) {
            $this->tasks = Task::where('user_id', Auth::id())->latest()->get();
            Cache::forever($cacheKey, $this->tasks);
        }
        
    }

    public function render()
    {
        $this->loadTasks();
        return view('livewire.tasks.tasks');
    }
}
