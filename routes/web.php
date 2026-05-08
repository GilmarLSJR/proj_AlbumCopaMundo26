<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FigurinhaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('figurinhas', FigurinhaController::class);