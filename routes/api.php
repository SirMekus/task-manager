<?php

use Illuminate\Support\Facades\Route;

Route::post('/tasks/reorder', [App\Http\Controllers\TaskController::class, 'reorder'])->name('tasks.reorder');