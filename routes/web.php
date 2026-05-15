<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FigurinhaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('figurinhas', FigurinhaController::class);
});
