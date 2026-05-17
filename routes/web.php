<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;  // <-- add this at the top

Route::get('/', function () {
    return view('welcome');
});

// Add this group:
Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggleComplete'])->name('tasks.toggle');
});

// If you have Breeze, it already added auth routes (login, register, dashboard, etc.)
// Those should remain below or above, doesn't matter as long as they exist.
// Typically Breeze adds: require __DIR__.'/auth.php';