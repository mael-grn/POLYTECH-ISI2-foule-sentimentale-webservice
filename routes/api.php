<?php

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\MusiqueController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ArtisteController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/musiques/free', [MusiqueController::class, 'showfree']);
Route::post('/register', [UtilisateurController::class, 'store']);
Route::post('/login', [UtilisateurController::class, 'login'])->name('login');


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UtilisateurController::class, 'logout']);
    Route::apiResource('utilisateurs', UtilisateurController::class);
    Route::apiResource('musiques', MusiqueController::class);
    Route::post('/musiques/{musique}/buy', [MusiqueController::class, 'buy']);
    Route::apiResource('albums', AlbumController::class);
    Route::apiResource('genres', GenreController::class);
    Route::apiResource('artistes', ArtisteController::class);
    Route::apiResource('playlists', PlaylistController::class);
});


