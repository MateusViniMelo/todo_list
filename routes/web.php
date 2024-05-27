<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware('guest');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('tarefa/mudar-status-completa/{tarefa}', [TaskController::class, "changeStatusCompleted"]);
    Route::get('tarefa-importante', [TaskController::class, "tasksImportants"]);
    Route::get('tarefa-completada', [TaskController::class, "tasksCompleteds"]);
    Route::resource('tarefa', TaskController::class)->only(['index', 'store', 'update',"destroy"]);
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/change-avatar-image', [ProfileController::class, 'changeImageAvatar'])->name('profile.change-avatar-image');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
