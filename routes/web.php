<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\GameController;

use App\Http\Controllers\MiddleStepController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\GameStepController;
use App\Http\Controllers\MainController;



Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/auth', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/game', [GameController::class, 'index'])->name('game');
Route::get('/game-step', [GameStepController::class, 'index'])->name('game-step');
Route::get('/middle-step', [MiddleStepController::class, 'index'])->name('middle-step');
