<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\CountrysController;
use App\Http\Controllers\CitysController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/countrys', [CountrysController::class, 'index']);

Route::post('/countrys', [CountrysController::class, 'store']);

Route::get('/citys', [CitysController::class, 'index']);

Route::post('/citys', [CitysController::class, 'store']);

Route::get('/hotels', [HotelsController::class, 'index']);

Route::post('/hotels', [HotelsController::class, 'store']);

Route::get('/tours', [ToursController::class, 'index']);

Route::post('/tours', [ToursController::class, 'store']);

Route::post('/orders', [OrderController::class, 'store']);






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

