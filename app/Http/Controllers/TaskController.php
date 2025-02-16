<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\TaskUpdated;
use Illuminate\Support\Facades\Cache;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks', compact('tasks'));
    }

    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        Task::create([
            'name' => $request->name,
            'user_id' => 1,
        ]);
    
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = $task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        return response()->json($task, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'done' => 'required|boolean',
        ]);

        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->update([
            'complete' => $request->done,
        ]);

        $data =[
            'user_id' => Auth::id(),
            'message' => 'task is updated',
        ];

        Cache::forget('task_list_user_' . Auth::id());

        event(new TaskUpdated ($data));
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();
        Cache::forget('task_list_user_' . Auth::id());
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
