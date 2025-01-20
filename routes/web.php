<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AuthController;

/**
 * Web Routes Configuration
 */

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('index');
})->name('home');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => ''], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/create-acc', [AuthController::class, 'showRegistrationForm'])->name('create-acc');
    Route::post('/create-acc', [AuthController::class, 'register']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/profile', [AuthController::class, 'profile'])
        ->name('profile')
        ->middleware('auth');
});

/*
|--------------------------------------------------------------------------
| Game Routes
|--------------------------------------------------------------------------
*/

// Base game routes
Route::get('/game', function () {
    return view('game');
})->name('game');

Route::get('/game-pres', function () {
    return view('game-pres');
})->name('game-pres');

// Game flow routes
Route::get('/game-step', [GameController::class, 'showGameStep'])->name('game.step');
Route::post('/game-step', [GameController::class, 'checkAnswer'])->name('game.check-answer');
Route::get('/game-start', [GameController::class, 'startGame'])->name('game.start');
Route::get('/game-middlestep', [GameController::class, 'showMiddleStep'])->name('game.middlestep');
Route::get('/game/end', [GameController::class, 'endGame'])->name('game.end');

/*
|--------------------------------------------------------------------------
| Contact Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'contact'], function () {
    Route::get('/', [ContactController::class, 'show'])->name('contact');
    Route::post('/', [ContactController::class, 'send'])->name('contact.send');
});
