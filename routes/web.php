<?php

use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/', '/tasks');

Route::resource('tasks', App\Http\Controllers\TaskController::class);