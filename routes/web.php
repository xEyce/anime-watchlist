<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WatchlistController;



Route::get('/', [AnimeController::class, 'index'])->name('index');

Route::post('/', [AnimeController::class, 'fetchTopByGenre'])->name('anime.filter');
Route::post('/anime/add', [AnimeController::class, 'addToWatchlist'])->name('anime.add');
Route::get('/watchlist', [WatchlistController::class, 'watchlist'])->name('anime.watchlist');
Route::get('/anime/view/{id}', [AnimeController::class, 'viewDetails'])->name('anime.view');

Route::delete('/anime/{id}', [AnimeController::class, 'removeToWatchlist'])->name('delete');


Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');