<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GameController;
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');


Route::get('/game', function () {
    return view('game');
})->name('game');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Route::get('/game-pres', function () {
    return view('game-pres');
})->name('game-pres');
Route::get('/game-step', [GameController::class, 'showGameStep'])->name('game.step');
Route::post('/game-step', [GameController::class, 'checkAnswer'])->name('game.check-answer');
Route::get('/game-start', [GameController::class, 'startGame'])->name('game.start');

Route::get('/game-middlestep', [GameController::class, 'showMiddleStep'])->name('game.middlestep');
