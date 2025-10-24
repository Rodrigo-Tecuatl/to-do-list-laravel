<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('showLogin');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');

Route::post('/register', [AuthController::class, 'register'])->name('createNewUser');
Route::post('/login', [AuthController::class, 'login'])->name('loginUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('logoutUser');

Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
