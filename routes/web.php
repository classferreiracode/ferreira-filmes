<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/favorites/movie', [ProfileController::class, 'favoriteMovie'])->name('favorite.movie');
    Route::get('/favorites/serie', [ProfileController::class, 'favoriteSerie'])->name('favorite.serie');
})->middleware(['auth']);


Route::get('/favorite/{id}/{type}', [HomeController::class, 'favorites'])->name('favorite')->middleware(['auth']);
Route::get('/favorites', [HomeController::class, 'getFavorites'])->name('get-favorite')->middleware(['auth']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
