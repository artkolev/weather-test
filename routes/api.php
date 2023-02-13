<?php

use App\Http\Controllers\Api\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::get('/weather/popular', [WeatherController::class, 'popular'])->name('weather.popular');
Route::get('/weather/results', [WeatherController::class, 'results'])->name('weather.results');
