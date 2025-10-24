<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Exception;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', session('user')['id'])->get();
        return view('tasks.tasks', compact('tasks'));
    }

    public function create()
    {
        if (is_null(session('user'))) {
            return redirect()->route('showLogin');
        }

        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();

        try {
            Task::create($validated + ['user_id' => session('user')['id']]);
            return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente.');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Ocurrió un error al crear la tarea: ' . $e->getMessage()])->withInput();
        }

    }

    public function edit(Task $task)
    {
        if (is_null(session('user'))) {
            return redirect()->route('showLogin');
        }

        Task::where('id', $task->id)->first();
        return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        if (!$task) {
            return redirect()->route('tasks.index')->withErrors(['error' => 'Tarea no encontrada.']);
        }

        $validated = $request->validated();

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada.');
    }

    public function destroy(Task $task)
    {
        if (!$task) {
            return redirect()->route('tasks.index')->withErrors(['error' => 'Tarea no encontrada.']);
        }

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada.');
    }

    public function complete(Task $task)
    {
        $task->update(['is_completed' => !$task->is_completed]);
        return redirect()->back();
    }
}
