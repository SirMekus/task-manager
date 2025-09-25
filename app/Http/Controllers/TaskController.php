<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Task::orderBy('priority', 'asc')->get();
        return view('page.task.index', ['tasks' => Task::orderBy('priority', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => ['required', 'string'],
        ]);
        $task = Task::create($formData);
        return redirect()->route('tasks.show', $task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('page.task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('page.task.create', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $formData = $request->validate([
            'name' => ['required', 'string'],
        ]);
        $task->update($formData);
        return redirect()->route('tasks.show', $task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function reorder(Request $request)
    {
        $order = $request->input('order', []);

        foreach ($order as $item) {
            Task::where('id', $item['id'])
                ->update(['priority' => $item['priority']]);
        }

        return response()->json(['status' => 'success']);
    }
}
