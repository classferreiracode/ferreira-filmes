<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::get('/movie/{id}', [HomeController::class, 'movie'])->name('movie');
Route::get('/serie/{id}', [HomeController::class, 'series'])->name('tv');

Route::prefix('person')->group(function () {
    Route::get('/', [PersonController::class, 'index'])->name('persons');
    Route::get('/{id}', [PersonController::class, 'profile'])->name('person');
});

Route::prefix('movie')->group(function () {
    Route::get('/casting/{id}', [HomeController::class, 'castingMovie'])->name('movie.casting');
});

Route::prefix('serie')->group(function () {
    Route::get('/casting/{id}', [HomeController::class, 'castingSerie'])->name('serie.casting');
});
