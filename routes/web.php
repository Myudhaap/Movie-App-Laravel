<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\TvController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/popular', [MoviesController::class, 'indexPopularMovies'])->name('movies.popular');
Route::get('/movies/now-playing', [MoviesController::class, 'indexNowPlayingMovies'])->name('movies.playing');
Route::get('/movies/{movie}', [MoviesController::class, 'show'])->name('movie.show');

Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [ActorsController::class, 'index']);
Route::get('/actors/{actor}', [ActorsController::class, 'show'])->name('actors.show');

Route::get('/tv', [TvController::class, 'index'])->name('tv.index');
Route::get('/tv/popular', [TvController::class, 'indexPopularTvs'])->name('tv.popular');
Route::get('/tv/on-airing', [TvController::class, 'indexOnAiringTvs'])->name('tv.playing');
Route::get('/tv/{tv}', [TvController::class, 'show'])->name('tv.show');
