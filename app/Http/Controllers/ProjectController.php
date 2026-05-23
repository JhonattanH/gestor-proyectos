<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    // Mostrar proyectos
    public function index()
    {
        // Obtener todos los proyectos
        $projects = Project::latest()->get();

        // Enviar datos a la vista
        return view('projects.index', compact('projects'));
    }

    // Guardar proyecto
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        // Crear proyecto
        Project::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        // Volver atrás
        return redirect('/projects');
    }
}
