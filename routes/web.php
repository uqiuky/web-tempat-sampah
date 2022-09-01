<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\ChartDataController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\EmailController;

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

Route::get('/', [LoginController::class, 'firstpage'])->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/email', [EmailController::class, 'kirim']);

Route::resource('/pekerja', DashboardUserController::class)->middleware('auth');

Route::resource('/dashboard', TrashController::class)->middleware('auth');

Route::resource('/data', ChartDataController::class)->middleware('auth');

Route::get('/foo', function () {
    Artisan::call('storage:link');
});