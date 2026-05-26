<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Rutas de proyectos
|--------------------------------------------------------------------------
*/

// Ver proyectos
Route::get('/projects', [ProjectController::class, 'index']);

// Guardar proyecto
Route::post('/projects', [ProjectController::class, 'store']);

// Formulario editar
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit']);

// Actualizar proyecto
Route::put('/projects/{project}', [ProjectController::class, 'update']);

// Eliminar proyecto
Route::delete('/projects/{project}', [ProjectController::class, 'destroy']);

// Estado del proyecto
Route::patch('/projects/{project}/status', [ProjectController::class, 'updateStatus']);

/*
|--------------------------------------------------------------------------
| Rutas de tareas
|--------------------------------------------------------------------------
*/

// Guardar tarea
Route::post('/projects/{project}/tasks', [TaskController::class, 'store']);

// Completar tarea
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete']);

// Eliminar tarea
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);