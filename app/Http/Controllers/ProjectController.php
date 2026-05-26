<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

Class ProjectController extends Controller
{
    // Mostrar lista de proyectos
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    // Guardar nuevo proyecto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Project::create(['name'=>$request->name, 'description'=>$request->description]);

        return redirect('projects')->with('success', 'Proyecto creado exitosamente.');
    }

    // Formulario para editar proyecto
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Actualizar proyecto
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update(['name'=>$request->name, 'description'=>$request->description]);

        return redirect('/projects')->with('success', 'Proyecto actualizado exitosamente.');
    }

    // Eliminar proyecto
    public function destroy(Project $project)
    {
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
