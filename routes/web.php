<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CountrysController;
use App\Http\Controllers\CitysController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/docapi', function () {
    return view('docapi');
});

Route::get('/countrys', [App\Http\Controllers\CountrysController::class, 'getCountrys']);
Route::get('/countrys/create', [App\Http\Controllers\CountrysController::class, 'create']);
Route::post('/countrys', [App\Http\Controllers\CountrysController::class, 'store']);
Route::get('/countrys/{id}/edit', [CountrysController::class, 'edit'])->name('countrys.edit');
Route::put('/countrys/{id}', [CountrysController::class, 'update'])->name('countrys.update');
Route::delete('/countrys/{id}', [CountrysController::class, 'destroy'])->name('countrys.destroy');

Route::get('/citys', [App\Http\Controllers\CitysController::class, 'getCitys']);
Route::get('/citys/create', [App\Http\Controllers\CitysController::class, 'create']);
Route::post('/citys', [App\Http\Controllers\CitysController::class, 'store']);
Route::get('/citys/{id}/edit', [CitysController::class, 'edit'])->name('citys.edit');
Route::put('/citys/{id}', [CitysController::class, 'update'])->name('citys.update');
Route::delete('/citys/{id}', [CitysController::class, 'destroy'])->name('citys.destroy');

Route::get('/hotels', [App\Http\Controllers\HotelsController::class, 'getHotels']);
Route::get('/hotels/create', [App\Http\Controllers\HotelsController::class, 'create']);
Route::post('/hotels', [App\Http\Controllers\HotelsController::class, 'store']);
Route::get('/hotels/{id}/edit', [HotelsController::class, 'edit'])->name('hotels.edit');
Route::put('/hotels/{id}', [HotelsController::class, 'update'])->name('hotels.update');
Route::delete('/hotels/{id}', [HotelsController::class, 'destroy'])->name('hotels.destroy');



Route::get('/tours', [App\Http\Controllers\ToursController::class, 'getTours']);
Route::get('/tours/create', [App\Http\Controllers\ToursController::class, 'create']);
Route::post('/tours', [App\Http\Controllers\ToursController::class, 'store']);
Route::get('/tours/{id}/edit', [ToursController::class, 'edit'])->name('tours.edit');
Route::put('/tours/{id}', [ToursController::class, 'update'])->name('tours.update');
Route::delete('/tours/{id}', [ToursController::class, 'destroy'])->name('tours.destroy');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');

Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::post('/orders/restore/{id}', [OrderController::class, 'restore'])->name('orders.restore');
Route::get('/orders/trashed', [OrderController::class, 'trashed'])->name('orders.trashed');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
