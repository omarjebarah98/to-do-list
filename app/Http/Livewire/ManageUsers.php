<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ManageUsers extends Component
{
    public $users;
    public $selectedUser;
    public $role;
    
    protected $listeners = ['userDeleted' => '$refresh'];

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = User::all();
        $cacheKey = 'users_list';
        
        $this->users = Cache::get($cacheKey);
        
        if (!$this->users) {
            $this->users = $this->users = User::all();
            Cache::forever($cacheKey, $this->users);
        }
    }

    public function changeRole($userId, $role)
    {
        $user = User::find($userId);
        
        if (!$user || Auth::user()->cannot('change-role', $user)) {
            session()->flash('error', 'You done have a permission to change a user role');
            return;
        }
        
        $user->update(['role' => $role]);
        Cache::forget('users_list');

        $this->loadUsers();
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        
        if (!$user || Auth::user()->cannot('delete-user', $user)) {
            session()->flash('error', 'You done have a permission to delete a user');
            return;
        }

        $user->delete();
        session()->flash('message', 'User deleted successfully.');
        $this->emit('userDeleted');
        Cache::forget('users_list');
        $this->loadUsers();
    }

    public function showUserTasks($userId)
    {
        $this->selectedUser = User::with('tasks')->find($userId);
    }

    public function render()
    {
        return view('livewire.users.manage-users');
    }
}
