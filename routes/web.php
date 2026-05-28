<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Rutas protegidas
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return redirect('/projects');
    })->middleware(['verified'])->name('dashboard');

    // PROYECTOS

    Route::get('/projects', [ProjectController::class, 'index']);

    Route::post('/projects', [ProjectController::class, 'store']);

    Route::get(
        '/projects/{project}/edit',
        [ProjectController::class, 'edit']
    );

    Route::put(
        '/projects/{project}',
        [ProjectController::class, 'update']
    );

    Route::delete(
        '/projects/{project}',
        [ProjectController::class, 'destroy']
    );

    // TAREAS

    Route::post(
        '/projects/{project}/tasks',
        [TaskController::class, 'store']
    );

    Route::put(
        '/tasks/{task}/complete',
        [TaskController::class, 'complete']
    );

    Route::delete(
        '/tasks/{task}',
        [TaskController::class, 'destroy']
    );
});

require __DIR__.'/auth.php';