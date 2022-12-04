<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WeatherController::class, "index"])->name('home');
Route::get('/search', [WeatherController::class, "search"])->name('search');
Route::post('/add-to-bookmark', [WeatherController::class, "addBookmark"])->name('add-to-bookmark');
Route::post('/remove-from-bookmark', [WeatherController::class, "removeBookmark"])->name('remove-from-bookmark');
