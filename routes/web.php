<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoricalController;
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

Route::get('/', [HistoricalController::class, 'index'])->name('index');
Route::post('/historical/save', [HistoricalController::class, 'save'])->name('historical.save');
Route::get('/historical/index', [HistoricalController::class, 'show'])->name('historical.show');

