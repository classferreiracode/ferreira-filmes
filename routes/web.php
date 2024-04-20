<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;

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
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/favorites/movie', [ProfileController::class, 'favoriteMovie'])->name('favorite.movie');
    Route::get('/favorites/serie', [ProfileController::class, 'favoriteSerie'])->name('favorite.serie');
})->middleware(['auth']);

Route::get('/favorite/{id}/{type}', [HomeController::class, 'favorites'])->name('favorite')->middleware(['auth']);
Route::get('/favorites', [HomeController::class, 'getFavorites'])->name('get-favorite')->middleware(['auth']);
Route::get('/favorites/movie', [HomeController::class, 'favoriteMovie'])->name('get-favorite.movie');
Route::get('/favorites/serie', [HomeController::class, 'favoriteSerie'])->name('get-favorite.serie');

Route::prefix()->group(function () {

});

Auth::routes();

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
