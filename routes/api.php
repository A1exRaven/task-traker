<?php

use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('tasks', TaskController::class)->only(['index', 'store', 'show', 'destroy', 'update']);
Route::apiResource('users', UserController::class)->only(['index', 'store', 'show', 'destroy', 'update']);
