<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $task->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
