<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('showLogin');

Route::get('/register', function () {
    return view('register');
})->name('showRegister');

Route::post('/register', [AuthController::class, 'register'])->name('createNewUser');
