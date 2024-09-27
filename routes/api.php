<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\VenueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/cities', [CityController::class, 'get']);
Route::get('/venue', [VenueController::class, 'get']);
