<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
    // Guardar nueva tarea
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->tasks()->create(['title' => $request->title, 'description' => $request->description]);

        return redirect('/projects')->with('success', 'Tarea creada exitosamente.');
    }

    // Completar tarea
    public function complete(Task $task) 
    {
        $task->update(['completed' => $task->completed ? false : true]);
        return redirect('/projects')->with('success', 'Tarea completada exitosamente.');
    }

    // Eliminar tarea
    public function destroy(Task $task)
    {        $task->delete();
        return redirect('/projects')->with('success', 'Tarea eliminada exitosamente.');
    }
}
