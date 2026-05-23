<?php

use App\Http\Controllers\ProjectController;

Route::get('/projects', [ProjectController::class, 'index']);

Route::post('/projects', [ProjectController::class, 'store']);
