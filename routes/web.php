<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WatchlistController;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [AnimeController::class, 'index'])->name('index');

Route::get('/anime', [AnimeController::class, 'fetchFromApi']);
Route::get('/genre/{id}', [AnimeController::class, 'fetchTopByGenre']);
Route::post('/anime/add', [AnimeController::class, 'addToWatchlist'])->name('anime.add');
Route::get('/anime/watchlist', [WatchlistController::class, 'watchlist'])->name('anime.watchlist');
Route::get('/anime/view/{id}', [AnimeController::class, 'viewDetails'])->name('anime.view');

Route::post('/', [AnimeController::class, 'fetchTopByGenre'])->name('genres.action');


Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');