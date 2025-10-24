<?php

use App\Http\Controllers\AuthController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('showLogin');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::post('/register', [AuthController::class, 'register'])->name('createNewUser');
Route::post('/login', [AuthController::class, 'login'])->name('loginUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('logoutUser');
