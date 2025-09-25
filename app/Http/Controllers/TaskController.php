<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view(
            'page.task.index',
            [
                'tasks' => Task::when($request->project_id, function ($query, $projectId) {
                    $query->where('project_id', $projectId);
                })
                ->orderBy('priority', 'asc')->get(),
                'projects' => Project::get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.task.create', ['projects' => Project::get(),]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request)
    {
        $formData = $request->validated();
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
        return view('page.task.create', ['task' => $task, 'projects' => Project::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateTaskRequest $request, Task $task)
    {
        $formData = $request->validated();
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
