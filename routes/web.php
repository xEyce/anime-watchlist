<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [AnimeController::class, 'index'])->name('index');

Route::get('/anime', [AnimeController::class, 'fetchFromApi']);
Route::get('/genre/{id}', [AnimeController::class, 'fetchTopByGenre']);
Route::post('/anime/add', [AnimeController::class, 'addToWatchlist'])->name('anime.add');
Route::get('/anime/watchlist', [AnimeController::class, 'watchlist'])->name('anime.watchlist');
Route::get('/anime/view/{id}', [AnimeController::class, 'viewDetails'])->name('anime.view');
