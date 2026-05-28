<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

Class ProjectController extends Controller
{
    // Mostrar lista de proyectos
    public function index()
    {
        $projects = auth()->user()->projects()->latest()->get();
        return view('projects.index', compact('projects'));
    }

    // Guardar nuevo proyecto
    public function store(Request $request, Project $project)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'nullable|in:baja,media,alta'
        ]);
        

        auth()->user()->projects()->create([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority ?? 'media',
        ]);

        return redirect('projects')->with('success', 'Proyecto creado exitosamente.');
    }

    // Formulario para editar proyecto
    public function edit(Project $project)
    {
            abort_if($project->user_id !== auth()->id(), 403);
            return view('projects.edit', compact('project'));
    }

    // Actualizar proyecto
    public function update(Request $request, Project $project)
    {
        abort_if($project->user_id !== auth()->id(), 403);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        abort_if($project->user_id !== auth()->id(), 403);
        $project->update(['name'=>$request->name, 'description'=>$request->description]);

        return redirect('/projects')->with('success', 'Proyecto actualizado exitosamente.');
    }

    // Eliminar proyecto
    public function destroy(Project $project)
    {
        abort_if($project->user_id !== auth()->id(), 403);
        $project->delete();
        return redirect('/projects')->with('success', 'Proyecto eliminado exitosamente.');
    }
    // Estado del proyecto
    public function updateStatus(Request $request, Project $project)
    {
        $request->validate([
            'status' => 'required|in:pendiente,en_progreso,completado'
        ]);

        $project->update(['status' => $request->status]);

        return redirect('/projects')->with('success', 'Estado del proyecto actualizado exitosamente.');
    }
}
